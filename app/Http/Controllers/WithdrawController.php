<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Contacts\Contact;
use App\Models\Withdraw;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class WithdrawController extends Controller
{
    private $paginate = 25;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        $withdraw_query = Withdraw::query();

        $withdraws = $withdraw_query->paginate($this->paginate);
        return view('withdraw.index', compact('contacts','withdraws'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts = Contact::all();
        $cash =Cash::where('name', 'cash')->first()->amount;
        return view('withdraw.create', compact('contacts','cash'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data =$request->validate([
            "withdraw_date" =>'required|date',
            "contact_id" => "required|numeric",
            "amount" => "required|numeric",
            "note" => 'nullable',
        ]);
        
        
        Withdraw::create($data);

        //find cash
        $cash =Cash::where('name', 'cash')->first();
        $new_cash =$cash->amount - $request->amount;

        //cash update
       $cash->update([
           'amount' => $new_cash,
       ]);


       return redirect()->back()->withSuccess("Withdraw has been saved successfully.");
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
        $withdraw = Withdraw::findOrFail($id);
        $contacts = Contact::all();
        $cash =Cash::where('name', 'cash')->first()->amount;
        return view('withdraw.edit', compact('withdraw','contacts','cash'));
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
        $withdraw = Withdraw::findOrFail($id);

        $data =$request->validate([
            "withdraw_date" =>'required|date',
            "contact_id" => "required|numeric",
            "amount" => "required|numeric",
            "note" => 'nullable',
        ]);

        $withdraw->update($data);

        return redirect()->route('withdraw.index')->withSuccess("Withdraw has been updated successfully.");
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
       $record = Withdraw::findOrFail($id);

       // Soft-delete data
       if($record->delete()) {
           session()->flash('success', "Record has been deleted successfully!");
       }

       // Force-delete data
       // $project->forceDelete();

       return redirect()->back();
    }
}
