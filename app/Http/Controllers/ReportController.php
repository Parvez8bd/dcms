<?php

namespace App\Http\Controllers;

use App\Models\InvoiceDetail;
use App\Models\Report;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    private $paginate = 25;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test_query=Report::with('invoice','test.test_group')->orderBy('id', 'DESC');
        
        if (request()->invoice_no) {
            $test_query->whereHas('invoice', function ($query) {
                $query->where('invoice_no',  request()->invoice_no );
             });
        }

        $tests= $test_query->paginate($this->paginate);
        return view('report.index',compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $tests=Report::with('invoice','test.test_group')->orderBy('id', 'DESC')->paginate($this->paginate);
        $test_query=Report::with('invoice','test.test_group')->orderBy('id', 'DESC');
        
        if (request()->invoice_no) {
            $test_query->whereHas('invoice', function ($query) {
                $query->where('invoice_no',  request()->invoice_no );
             });
        }

        $tests= $test_query->paginate($this->paginate);
        return view('report.create1',compact('tests'));
    }

    public function singleCreate($id)
    {
        
        $report=Report::with('invoice','test.test_group')->findOrFail($id);
        return view('report.create',compact('report'));
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
            "id" => 'required',
            "report" => 'required'

        ]);

        $report=Report::findOrFail($request->id);
         $report->update([
            "report" => $request->report,
            "status" => 'Rady to print',
        ]);

        return redirect()->route('lab-report.show', $report->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $report=Report::with('invoice.patient.patient_refferr','test.test_group')->findOrFail($id);
        
        // $pdf = PDF::loadView('report.pdf',compact('report'))->setOptions(['defaultFont' => 'sans-serif']);
        // return $pdf->stream();
        return view('report.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report=Report::with('invoice','test.test_group')->findOrFail($id);


        return view('report.update',compact('report'));
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
        $report=Report::with('invoice','test.test_group')->findOrFail($id);
        
        request()->validate([
            "id" => 'required',
            "report" => 'required'
        ]);
        $report->update([
            "report" => request()->report,
        ]);
        return redirect()->route('lab-report.show', $report->id);
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
