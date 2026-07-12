<?php

namespace App\Http\Controllers;

use App\Models\ExpensesCategory;
use App\Models\ExpenseSubcategory;
use Illuminate\Http\Request;

class ExpenseSubcategoryController extends Controller
{
    private $paginate = 25;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = ExpenseSubcategory::with('expensesCategory')->paginate($this->paginate);

        // search by name
        if (request()->search) {
            $where[] = ['name', 'LIKE', "%" . request()->name . "%"];
            $records = ExpenseSubcategory::with('ExpenseCategory')->where($where)->paginate($this->paginate);
        }

        return view('expense.subCategory.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categories = ExpensesCategory::select('id', 'name')->get();
        return view('expense.subCategory.create', compact('categories'));
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
        "expenses_category_id" => 'required',
        'name' => 'required|string|max:100',
        "opening_balance" => 'nullable',
        'description' => 'nullable',
    ]);

    // insert course data
    ExpenseSubcategory::create($data);

    // view
    return redirect()->route('expense-subcategory.create')->withSuccess("Subcategory has been create successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = ExpenseSubcategory::findOrFail($id);
        return view('expense.subCategory.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = ExpenseSubcategory::findOrFail($id);
        $categories = ExpensesCategory::get();
        return view('expense.subCategory.edit', compact('record', 'categories'));
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
        $record = ExpenseSubcategory::findOrFail($id);

        // validation
        $data = $request->validate([
            "expenses_category_id" => 'required',
            'name' => 'required|string|max:100',
            "opening_balance" => 'nullable',
            'description' => 'nullable',
        ]);

        // insert course data
        $record->update($data);

        // view
        return redirect()->route('expense-subcategory.index')->withSuccess("Subcategory has been updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = ExpenseSubcategory::findOrFail($id);

        //Soft-delete data
        $record->delete();

        session()->flash('success', "Sub-category has been successfully Deleted !");

        return back();
    }

    /**
     *
     * react component method for add subcategories by category
     *
     */

    public function getSubcategoriesById()
    {
        return ExpenseSubcategory::where('expenses_category_id', '=', request()->category_id)->get();
    }


    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        // get all category
         $records = ExpenseSubcategory::with('expensesCategory')->onlyTrashed()->paginate($this->paginate);

        // search by name
        if (request()->search) {
            $where[] = ['name', 'LIKE', "%" . request()->name . "%"];
            $records = ExpenseSubcategory::onlyTrashed()->where($where)->paginate($this->paginate);
        }

        // view
        return view('expense.subCategory.trash', compact('records'));
    }

    /**
     *
     */
    public function restore($id)
    {
        // restore by id
        ExpenseSubcategory::withTrashed()->find($id)->restore();

        // view
        return redirect()->back()->withSuccess('Expense subcategory restore successfully.');
    }

    /**
     *
     */
    public function permanentDelete($id)
    {
        // Permanent delete by id
        ExpenseSubcategory::withTrashed()->find($id)->forceDelete();

        // view
        return redirect()->back()->withSuccess('Expense subcategory deleted permanently.');
    }

    /**
     *
     */
    public function restoreOrDelete(Request $request)
    {
        if ($request->subcategories != null) {
            if ($request->restore) {
                foreach ($request->subcategories as $subcategory) {
                    ExpenseSubcategory::withTrashed()->find($subcategory)->restore();
                }

                // view
                return redirect()->back()->withSuccess('Expense subcategories restored successfully.');
            } else {
                foreach ($request->subcategories as $subcategory) {
                    ExpenseSubcategory::withTrashed()->find($subcategory)->forceDelete();
                }

                // view
                return redirect()->back()->withSuccess('Expense subcategories deleted permanently.');
            }
        }

        return back()->withErrors('No category(s) has been selected.');
    }
}
