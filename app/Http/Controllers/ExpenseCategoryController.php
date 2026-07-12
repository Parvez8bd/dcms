<?php

namespace App\Http\Controllers;

use App\Models\ExpensesCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    private $paginate = 25;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = ExpensesCategory::select('id', 'name', 'description')
            
            ->paginate($this->paginate);

        // search by name
        if (request()->search) {
            $where[] = ['name', 'LIKE', "%" . request()->name . "%"];
            $records = ExpensesCategory::select('id', 'name', 'description')->where($where)->paginate($this->paginate);
        }
        return view('expense.category.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expense.category.create');
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
            'name' => 'required|string|max:100',
            'description' => 'nullable',
        ]);

        // insert course data
        ExpensesCategory::create($data);

        // view
        return redirect()->route('expense-category.create')->withSuccess("Category has been create successfully.");
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
        $record = ExpensesCategory::findOrFail($id);
        return view('expense.category.edit', compact('record'));
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
        $record = ExpensesCategory::findOrFail($id);

        // validation
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable',
        ]);

        // insert course data
        $record->update($data);
        // view
        return redirect()->route('expense-category.index')->withSuccess( "Category has been update successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = ExpensesCategory::findOrFail($id);

        //Soft-delete data
        $record->delete();

        session()->flash('success', "Category has been successfully Deleted !");

        return back();
    }


    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        // get all category
        $records = ExpensesCategory::onlyTrashed()->paginate($this->paginate);

        // search by name
        if (request()->search) {
            $where[] = ['name', 'LIKE', "%" . request()->name . "%"];
            $records = ExpensesCategory::onlyTrashed()->where($where)->paginate($this->paginate);
        }

        // view
        return view('expense.category.trash', compact('records'));
    }

    /**
     *
     */
    public function restore($id)
    {
        // restore by id
        ExpensesCategory::withTrashed()->find($id)->restore();

        // view
        return redirect()->back()->withSuccess('Expense category restore successfully.');
    }

    /**
     *
     */
    public function permanentDelete($id)
    {
        // Permanent delete by id
        ExpensesCategory::withTrashed()->find($id)->forceDelete();

        // view
        return redirect()->back()->withSuccess('Expense category deleted permanently.');
    }

    /**
     *
     */
    public function restoreOrDelete(Request $request)
    {
        if ($request->categories != null) {
            if ($request->restore) {
                foreach ($request->categories as $category) {
                    ExpensesCategory::withTrashed()->find($category)->restore();
                }

                // view
                return redirect()->back()->withSuccess('Expense categories restored successfully.');
            } else {
                foreach ($request->categories as $category) {
                    ExpensesCategory::withTrashed()->find($category)->forceDelete();
                }

                // view
                return redirect()->back()->withSuccess('Expense categories deleted permanently.');
            }
        }

        return back()->withErrors('No category(s) has been selected.');
    }
}
