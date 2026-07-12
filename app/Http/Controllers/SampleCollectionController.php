<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Report;
use Illuminate\Http\Request;

class SampleCollectionController extends Controller
{
    private $paginate = 25;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests =Report::with('invoice','test.test_group')->orderBy('id', 'DESC')->where('status', 'Sample Collected')->paginate($this->paginate);
        return view('sampleCollection.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoice=Invoice::with('patient', 'report')->where('invoice_no', request()->invoice_no)->first();
        return view('sampleCollection.create', compact('invoice'));
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
            'invoice_id' => 'required',
            'status' => 'required',
        ]);
        $report =Report::where('invoice_id', $request->invoice_id);
        $report->update([
            'status' => $request->status,
        ]);
        return redirect()->route('sample-collection.show',$request->invoice_id );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reports =Report::with('invoice')->where('invoice_id', $id)->get();
        return view('sampleCollection.show', compact('reports'));
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
