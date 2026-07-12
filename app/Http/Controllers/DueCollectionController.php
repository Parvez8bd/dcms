<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Transaction;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class DueCollectionController extends Controller
{
    private $paginate = 25;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $transaction_query = Transaction::with('patient')->where('transaction_type', '!=', 'Commission');
        //search by date
        if(request()->date_from !=null){
            $date_to =request('date_to') ? request('date_to') : date('Y-m-d');
            
            $transaction_query->whereDate('updated_at', '>=', request('date_from'))
                ->whereDate('updated_at', '<=', $date_to);

        }
        //search by contact_id
        if (request()->name) {
            $transaction_query->whereHas('patient', function ($query) {
                $query->where('name', 'LIKE', '%'. request()->name .'%');
             });
             
        }
        $transactions =$transaction_query->paginate($this->paginate);

        return view('due.index', compact('transactions'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoice=Invoice::with('patient')->where('invoice_no', request()->invoice_no)->first();
        return view('due.create', compact('invoice'));
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
        "invoice_id" => 'required',
        "paid" => 'required',
       ]);
       $invoice = Invoice::findOrFail($request->invoice_id);
       $amount =$invoice->paid + $request->paid;
       $invoice->update([
        "paid" => $amount,
       ]);

       //transaction
       $transaction= Transaction::create([
        "amount" => $request->paid,
        "transaction_type" => 'Due Payment',
        ]);
        // transactionables 
        if($request->patient_id) {
            $patient = Patient::findOrFail($request->patient_id);
            $patient->transactions()->attach([
                $transaction->id => [
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
       return redirect()->back()->withSuccess('Due amount Successfully Paid');
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
}
