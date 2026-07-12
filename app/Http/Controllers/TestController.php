<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\TestGroup;
use Illuminate\Http\Request;

class TestController extends Controller
{
    private $paginate = 25;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests_query = Test::with('test_group');

        if (request()->title) {
            $tests_query->where('title', 'LIKE', '%' . request()->title . '%');
        }

        $tests=$tests_query->paginate($this->paginate);
        // view 
        return view('test.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $testGroups=TestGroup::all();
         // view 
         return view('test.create',compact('testGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $data =$request->validate([
            "title" =>'required|string|max:100',
            "test_group_id" =>'required|string|max:100',
            "price" =>'required|numeric',
            "report_time" =>'nullable',
            "room" =>'nullable',
            "discount" =>'nullable|numeric',
            "discount_type" =>'nullable',
            "commission" =>'nullable|numeric',
            "commission_type" =>'nullable',
            "description" =>'nullable',
        ]);

        //create
        Test::create($data);


        return redirect()->back()->withSuccess('Test group has been created successfully.');
        
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
        //findOrFail
       $test = Test::findOrFail($id);

       $testGroups=TestGroup::all();
        // view 
        return view('test.edit',compact('test','testGroups'));

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
         //findOrFail
       $test = Test::findOrFail($id);
        //validate
        $data =$request->validate([
            "title" =>'required|string|max:100',
            "test_group_id" =>'required|string|max:100',
            "price" =>'required|numeric',
            "report_time" =>'nullable',
            "room" =>'nullable',
            "discount" =>'nullable|numeric',
            "discount_type" =>'nullable',
            "commission" =>'nullable|numeric',
            "commission_type" =>'nullable',
            "description" =>'nullable',
        ]);

        //update
        $test->update($data);


        return redirect()->route('test.index')->withSuccess('Test group has been updated successfully.');
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
        $record = Test::findOrFail($id);

        // Soft-delete data
        if($record->delete()) {
            session()->flash('success', "Record has been deleted successfully!");
        }

        // Force-delete data
        // $project->forceDelete();

        return back();
    }

     /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        // get all Project
        $records = Test::onlyTrashed()->paginate($this->paginate);

        // view
        return view('test.trash', compact('records'));
    }

    /**
     *
     */
    public function restore($id){
        // restore by id
        Test::withTrashed()->find($id)->restore();

        // view
        return redirect()->back()->withSuccess('Record has been restored.');
    }

     /**
     *
     */
    public function permanentDelete($id)
    {
        // Permanent delete by id
        Test::withTrashed()->find($id)->forceDelete();

        // view
        return redirect()->back()->withSuccess('Record has been deleted permanently.');
    }

     /**
     *
     */
    public function restoreOrDelete(Request $request)
    {
        if ($request->records != null) {
            if ($request->restore) {
                foreach ($request->records as $record) {
                    Test::withTrashed()->find($record)->restore();
                }

                // view
                return redirect()->back()->withSuccess('Record(s) has been restored.');
            } else {
                foreach ($request->records as $record) {
                    Test::withTrashed()->find($record)->forceDelete();
                }

                // view
                return redirect()->back()->withSuccess('Record(s) has been deleted permanently.');
            }
        }

        return back()->withErrors('No Record(s) has been selected.');
    }
}
