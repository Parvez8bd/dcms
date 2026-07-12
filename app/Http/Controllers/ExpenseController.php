<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpensesCategory;
use App\Models\ExpenseSubcategory;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ExpenseController extends Controller
{
    private $paginate =25;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records_query = Expense::with('expenseSubcategory');
        $categories = ExpensesCategory::all();
        $subcategories = ExpenseSubcategory::all();


        if (request()->search) {

            // set date
            $date = [];

            // set date
            if (request()->form_date != null) {
                $date[] = date(request()->form_date);

                if (request()->to_date != null) {
                    $date[] = date(request()->to_date);
                } else {
                    if (request()->form_date != null) {
                        $date[] = date('Y-m-d');
                    }
                }

                if (count($date) > 0) {
                    $records_query = $records_query->whereBetween('date', $date);
                }
            }
            // set date
            if (request()->subcategory_id != null) {
                $records_query = $records_query->where('expense_subcategory_id', 'LIKE', "%" . request()->subcategory_id . "%");
                
            }
        }
        // get data
        $records = $records_query->paginate($this->paginate);

        return view('expense.index', compact('records', 'categories', 'subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ExpensesCategory::all();
        return view('expense.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    return $request->all();
        // validation
        $data = $request->validate([
            "date" => 'required',
            "expenses_category_id" => 'required',
            "expense_Subcategory_id" => 'required',
            "amount" => 'required',
            "deduct" => 'nullable',
            "description" => 'nullable',
        ]);

        if ($data['deduct'] == null) {
            $data['deduct'] = 0;
        }

        // insert expense data
        Expense::create($data);

        // view
        return redirect()->back()->withSuccess("Expense has been create successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = Expense::findOrFail($id);
        return view('expense.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Expense::findOrFail($id);
        $categories = ExpensesCategory::all();
        foreach ($categories as $key => $category) {
            $category['is_selected'] = false;
        }

        return view('expense.edit', compact('record', 'categories'));
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
        $record = Expense::findOrFail($id);
        // validation
        $data = $request->validate([
            'date' => 'required',
            "expenses_category_id" => 'required',
            "expense_Subcategory_id" => 'required',
            "amount" => 'required',
            "deduct" => 'nullable',
            'description' => 'nullable',
        ]);

        if (
            $data['deduct'] == null
        ) {
            $data['deduct'] = 0;
        }

        // update expense data
        $record->update($data);

        // view
        return redirect()->route('expense.index')->withSuccess("Expense has been update successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Expense::findOrFail($id);

        //Soft-delete data
        $record->delete();

        session()->flash('success', "Expense has been successfully Deleted !");

        return back();
    }

    public function getAllDeducts()
    {
        return Expense::where('expense_subcategory_id', '=', request()->subcategory_id)->sum('deduct');
    }

    public function trash()
    {
        // get all expense
        $records_query = Expense::onlyTrashed();
        $categories = ExpensesCategory::all();
        $subcategories = ExpenseSubcategory::all();


        if (request()->search) {

            // set date
            $date = [];

            // set date
            if (
                request()->form_date != null
            ) {
                $date[] = date(request()->form_date);

                if (request()->to_date != null) {
                    $date[] = date(request()->to_date);
                } else {
                    if (request()->form_date != null) {
                        $date[] = date('Y-m-d');
                    }
                }

                if (count($date) > 0) {
                    $records_query = $records_query->whereBetween('date', $date);
                }
            }
        }
        // get data
        $records = $records_query->onlyTrashed()->paginate($this->paginate);

        // view
        return view('expense.trash', compact('records'));
    }

    /**
     *
     */
    public function restore($id)
    {
        // restore by id
        Expense::withTrashed()->find($id)->restore();

        // view
        return redirect()->back()->withSuccess('Expense restore successfully.');
    }

    /**
     *
     */
    public function permanentDelete($id)
    {
        // Permanent delete by id
        Expense::withTrashed()->find($id)->forceDelete();

        // view
        return redirect()->back()->withSuccess('Expense deleted permanently.');
    }

    /**
     *
     */
    public function restoreOrDelete(Request $request)
    {
        if ($request->expenses != null) {
            if ($request->restore) {
                foreach ($request->expenses as $expense) {
                    Expense::withTrashed()->find($expense)->restore();
                }

                // view
                return redirect()->back()->withSuccess('Expenses restored successfully.');
            } else {
                foreach ($request->expenses as $expense) {
                    Expense::withTrashed()->find($expense)->forceDelete();
                }

                // view
                return redirect()->back()->withSuccess('Expenses deleted permanently.');
            }
        }

        return back()->withErrors('No expense(s) has been selected.');
    }
}
