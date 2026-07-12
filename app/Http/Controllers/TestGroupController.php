<?php

namespace App\Http\Controllers;

use App\Models\TestGroup;
use Illuminate\Http\Request;

class TestGroupController extends Controller
{
    private $paginate = 25;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testGroups_query = TestGroup::withoutTrashed();

        if (request()->title) {
            $testGroups_query->where('title', 'LIKE', '%' . request()->title . '%');
        }

        $testGroups = $testGroups_query->paginate($this->paginate);
        // view 
        return view('group.index', compact('testGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         // view 
         return view('group.create');
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

        //validate
        $data = $request->validate([
             'title' => 'required|max:100',
             'description' => 'nullable'
         ]);

         //create
         TestGroup::create($data);

        //return back
        return redirect()->back()->withSuccess('Test has been created successfully.');
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
        $record =TestGroup::findOrFail($id);

         // view 
         return view('group.edit', compact('record'));
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
        $record =TestGroup::findOrFail($id);

        //validate
        $data = $request->validate([
            'title' => 'required|max:100',
            'description' => 'nullable'
        ]);

        //create
        $record->update($data);

       //return back
       return redirect()->route('test-group.index')->withSuccess('Test group has been updated successfully.');
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
        $record = TestGroup::findOrFail($id);

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
        $records = TestGroup::onlyTrashed()->paginate($this->paginate);

        // view
        return view('group.trash', compact('records'));
    }

    /**
     *
     */
    public function restore($id){
        // restore by id
        TestGroup::withTrashed()->find($id)->restore();

        // view
        return redirect()->back()->withSuccess('Record has been restored.');
    }

     /**
     *
     */
    public function permanentDelete($id)
    {
        // Permanent delete by id
        TestGroup::withTrashed()->find($id)->forceDelete();

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
                    TestGroup::withTrashed()->find($record)->restore();
                }

                // view
                return redirect()->back()->withSuccess('Record(s) has been restored.');
            } else {
                foreach ($request->records as $record) {
                    TestGroup::withTrashed()->find($record)->forceDelete();
                }

                // view
                return redirect()->back()->withSuccess('Record(s) has been deleted permanently.');
            }
        }

        return back()->withErrors('No Record(s) has been selected.');
    }
}
