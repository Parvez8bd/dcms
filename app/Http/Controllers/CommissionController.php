<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\CommissionDistribution;
use App\Models\Contacts\Contact;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    private $paginate = 25;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $commission_query = Transaction::with('commission.contact')->where('transaction_type',  'Commission');
        //search by date
        if(request()->date_from !=null){
            $date_to =request('date_to') ? request('date_to') : date('Y-m-d');
            
            $commission_query->whereDate('updated_at', '>=', request('date_from'))
                ->whereDate('updated_at', '<=', $date_to);

        }

        //search by contact_id
        if (request()->contact_id) {
            $commission_query->whereHas('commission.contact', function ($query) {
                $query->where('contact_id',  request()->contact_id );
             });
             
        }
        $contacts = Contact::all();
        $commissions =$commission_query->paginate($this->paginate);
        return view('commission.index', compact('commissions', 'contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commissions=0;
        // $invoice=Invoice::with('patient')->where('invoice_no', request()->invoice_no)->first();
        $contacts= Contact::all();
        if (request()->refferr_by_id) {
            $commissions=Commission::with('contact','test')->where('refferr_by_id', request()->refferr_by_id )->get();
        }
        return view('commission.create', compact('contacts','commissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "contact_id"=> 'required',
            "commission_ids"=> 'required',
            "commission"=> 'required',
            "paid" => 'required',
        ]);

        //Commission update
        foreach ($request->commission_ids as $id) {
            $commission =Commission::findOrFail($id);
            $commission->update([
                'status' => 'paid',
            ]);
        }
        
        $CommissionDistribution =CommissionDistribution::create([
            'distribution_date'=>$request->distribution_date,
            'contact_id'=>$request->contact_id,
            'commission'=>$request->commission,
            'paid'=>$request->paid,
        ]);
        $transaction= Transaction::create([
            "amount" => $request->paid,
            "transaction_type" => 'Commission',
        ]);
        // transactionables 
        if($CommissionDistribution) {
            
            $CommissionDistribution->transactions()->attach([
                $transaction->id => [
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
        return redirect()->back()->withSuccess('Commission amount has been Distribution Successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commission =Commission::with('contact.commissionDistribution')->findOrFail($id);
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
}
