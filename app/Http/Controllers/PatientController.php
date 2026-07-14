<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Commission;
use App\Models\Contacts\Contact;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Patient;
use App\Models\PatientRefferr;
use App\Models\Report;
use App\Models\Test;
use App\Models\TestGroup;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    private $paginate = 25;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient_query = Patient::with('patient_refferr.doctor');
        //search by name
        if (request()->name) {
            $patient_query->where('name', 'LIKE', '%' . request()->name . '%');
        }
        //search by phone
        if (request()->phone) {
            $patient_query->where('phone', request()->phone);
        }

        //search by doctor
        if (request()->contact_id) {
            $patient_query->whereHas('patient_refferr.doctor', function ($query) {
                $query->where('refferr_doctor_id',  request()->contact_id);
            });
        }
        $patients = $patient_query->orderBy('id', 'DESC')->paginate($this->paginate);
        $contacts = Contact::where('contact_type', 'Doctor')->get();
        return view('patient.index', compact('patients', 'contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $contacts = Contact::with('communications')->where('contact_type', '!=', 'Doctor')->get();
        $data['doctors'] = Contact::where('contact_type', 'Doctor')->get();
        $tests = Test::all();
        $testgroups = TestGroup::all();
        return view('patient.create', compact('contacts', 'tests', 'testgroups'))->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        // return $request->test_discount;
        //validation
        $request->validate([
            "name" => 'required|string|max:100',
            "phone" => 'required|numeric',

            // At least one of these is required
            "age_year" => 'nullable|numeric|required_without_all:age_month,age_day',
            "age_month" => 'nullable|numeric|required_without_all:age_year,age_day',
            "age_day" => 'nullable|numeric|required_without_all:age_year,age_month',

            "gender" => 'required|string',
            "address" => 'nullable|string',
            "referr_doctor" => 'required|numeric',
            "referr_by" => 'nullable|numeric',
            "test_group_id" => 'nullable|numeric',
            "test_id" => 'required|array|min:1',
            "subtotal" => 'required|numeric',
            "discount_type" => 'nullable|string',
            "discount" => 'nullable|numeric',
            "paid" => 'nullable|numeric',
        ]);

        $request['discount'] = $request->discount == "Null" ? 0 : $request->discount;
        $request['paid'] = $request->paid == "Null" ? 0 : $request->paid;


        DB::transaction(function () use ($request, &$patient) {
            // create Patient
            $patient = Patient::create([
                "name" => $request->name,
                "phone" => $request->phone,
                "age_year" => $request->age_year,
                "age_month" => $request->age_month,
                "age_day" => $request->age_day,
                "gender" => $request->gender,
                "address" => $request->address,
            ]);

            //find cash
            $cash = Cash::where('name', 'cash')->first();
            $new_cash = $cash->amount + $request->paid;

            //cash update
            $cash->update([
                'amount' => $new_cash,
            ]);

            // create PatientRefferr
            PatientRefferr::create([
                "patient_id" => $patient->id,
                "refferr_doctor_id" => $request->referr_doctor,
                "refferr_by_id" => $request->referr_by,
            ]);

            // generate a pin based on 1 to 9 digits
            $pin = 'INV' . str_pad(Invoice::max('id') + 1, 6, '0', STR_PAD_LEFT);

            // create Invoice
            $invoice = Invoice::create([
                "patient_id" => $patient->id,
                "invoice_no" => $pin,
                "subtotal" => $request->subtotal,
                "subtotal" => $request->subtotal,
                "vat" => 0,
                "discount" => $request->discount,
                "discount_type" => $request->discount_type,
                "paid" => $request->paid,
            ]);

            //old
            // $array_combine = array_combine($request->test_id, $request->test_discount);
            // // create InvoiceDetail
            // foreach ($array_combine as $test_id => $discount) {
            //     // foreach ($request->test_discount as $discount) {
            //     InvoiceDetail::create([
            //         "invoice_id" => $invoice->id,
            //         "test_id" => $test_id,
            //         "discount" => $discount ?? '0',
            //     ]);
            // }

            //new
            $discounts = $request->input('test_discount', []);

            foreach ($request->test_id as $index => $test_id) {
                InvoiceDetail::create([
                    'invoice_id' => $invoice->id,
                    'test_id'    => $test_id,
                    'discount'   => $discounts[$index] ?? 0,
                ]);
            }


            // create InvoiceDetail
            foreach ($request->test_id as $test_id) {
                Report::create([
                    "invoice_id" => $invoice->id,
                    "test_id" => $test_id,
                    "status" => 'Painding',
                ]);
            }

            // create Commission for refferr
            if ($request->referr_by) {
                foreach ($request->test_id as $test_id) {
                    Commission::create([
                        "refferr_by_id" => $request->referr_by,
                        "test_id" => $test_id,
                        "status" => 'due',
                    ]);
                }
            }

            $transaction = Transaction::create([
                "amount" => $request->paid,
                "transaction_type" => 'Payment',
            ]);

            // transactionables
            if ($patient) {
                $patient->transactions()->attach([
                    $transaction->id => [
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ]);
            }
        });

        return redirect()->route('patient.show', $patient->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $patient = Patient::with('patient_refferr.doctor', 'invoice.invoice_details.test')->findOrFail($id);
        // return $patient->invoice;

        return view('patient.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function gettestById()
    {
        return Test::where('test_group_id', '=', request()->test_group_id)->get();
    }
}
