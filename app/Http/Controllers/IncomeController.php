<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    private $paginate = 25;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $income_query = Income::query();

        $incomes = $income_query->paginate($this->paginate);
        return view('income.index',compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('income.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       // validation
       $data = $request->validate([
        'income_date' => 'required|date_format:Y-m-d',
        'income_sourse' => 'required',
        'amount' => 'required|numeric',
        'note' => 'nullable|string|max:1000',
        ]);

        Income::create($data);

        //find cash
       $cash =Cash::where('name', 'cash')->first();
       $new_cash =$cash->amount + $request->amount;

       //cash update
      $cash->update([
          'amount' => $new_cash,
      ]);

        return redirect()->back()->withSuccess("Income has been saved successfully.");
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
       $income = Income::findOrFail($id);
        return view('income.edit', compact('income'));
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

        $income = Income::findOrFail($id);

        // validation
       $data = $request->validate([
        'income_date' => 'required|date_format:Y-m-d',
        'income_sourse' => 'required',
        'amount' => 'required|numeric',
        'note' => 'nullable|string|max:1000',
        ]);

        $income->update($data);

        return redirect()->route('income.index')->withSuccess("Income has been update successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get specified resource
        $record = Income::findOrFail($id);

        // Soft-delete data
        if($record->delete()) {
            session()->flash('success', "Record has been deleted successfully!");
        }

        // Force-delete data
        // $project->forceDelete();

        return redirect()->back();
    }
}
