<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Contacts\Contact;
use App\Models\Investment;
use App\Models\Project;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    private $paginate = 25;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investments_query= Investment::with('contact')->withoutTrashed();

        // search
        
        //by project_id
        if (request()->project_id) {
            $investments_query->where('project_id', 'like', '%' . request('project_id') . '%');
        }
        // by Contact
        if (request()->contact_id) {
            $investments_query->where('contact_id', 'like', '%' . request('contact_id') . '%');
        }
        

        // paginate
        $investments = $investments_query->orderBy('id','DESC')->paginate($this->paginate);

        // $projects = Project::all();
        $investors = Contact::all();

        // view 
        return view('investment.index', compact('investments','investors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get resources
        $contacts = Contact::where('contact_type', 'Owner')->get();
        // $projects = Project::all();
        $investmentPolicies = config('utilities.investment_policy');
        $withdrawPolicies = config('utilities.withdraw_policy');
        $duration = config('utilities.duration');

        return view('investment.create', compact( 'contacts', 'investmentPolicies', 'withdrawPolicies','duration'));
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
        // validation
        $data = $request->validate([
            'investment_date' => 'required|date_format:Y-m-d',
            // 'project_id' => 'required',
            'contact_id' => 'required',
            // 'nominee_id' => 'required',
            'amount' => 'required|numeric',
            // 'duration' => 'required|numeric',
            // 'interest' => 'required|numeric|between:1,100',
            // 'investment_policy' => 'required|string|max:100',
            // 'withdraw_policy' => 'required|numeric',
            'note' => 'nullable|string|max:1000',
        ]);

        // add more 
        // $data['expiry_date'] = date('Y-m-d', strtotime($request->investment_date . "+" . $request->duration . "months"));

        // insert 
       $investment = Investment::create($data);

       //find cash
       $cash =Cash::where('name', 'cash')->first();
       $new_cash =$cash->amount + $request->amount;

       //cash update
      $cash->update([
          'amount' => $new_cash,
      ]);

        // $withdraw_times = ($request->duration/$request->withdraw_policy);
        // $distribution_date = $request->investment_date;
        // $withdraw_month = 12/$request->withdraw_policy;
        // $profit_amount= ((($request->amount * $request->interest)/100)/$withdraw_month);
        
        // for ($i=0; $i < $withdraw_times; $i++) { 
        //   $distribution_date = date('Y-m-d', strtotime($distribution_date . "+" . $request->withdraw_policy. "months"));
        // //   $distribution_date = today()->addMin

        //     InvestmentDetails::create([
        //     'investment_id' => $investment->id,
        //     'distribution_date' =>  $distribution_date,
        //     'profit_amount' =>  $profit_amount,
        //     'status' =>  "due",
        //     ]);
        // }

        // view
        return redirect()->back()->withSuccess("Investment has been saved successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //findOrFail
        $investment = Investment::with('contact','nominee')->findOrFail($id);
        return view('investment.show', compact('investment'));
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
         $investment = Investment::findOrFail($id);
        // get resources
        $contacts = Contact::all();
        // $projects = Project::all();
        // $investmentPolicies = config('utilities.investment_policy');
        // $withdrawPolicies = config('utilities.withdraw_policy');
        // $duration = config('utilities.duration');

        return view('investment.edit', compact('investment','contacts'));
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
        $investment = Investment::findOrFail($id);

        // validation
        $data = $request->validate([
            'investment_date' => 'required|date_format:Y-m-d',
            // 'project_id' => 'required',
            'contact_id' => 'required',
            // 'nominee_id' => 'required',
            'amount' => 'required|numeric',
            // 'duration' => 'required|numeric',
            // 'interest' => 'required|numeric|between:1,100',
            // 'investment_policy' => 'required|string|max:100',
            // 'withdraw_policy' => 'required|numeric',
            'note' => 'nullable|string|max:1000',
        ]);
        $investment->update($data);

        // $investment->investmentDetails()->delete();

        // $withdraw_times = ($request->duration/$request->withdraw_policy);
        // $distribution_date = $request->investment_date;
        // $withdraw_month = 12/$request->withdraw_policy;
        // $profit_amount= ((($request->amount * $request->interest)/100)/$withdraw_month);
        
        // for ($i=0; $i < $withdraw_times; $i++) { 
        //   $distribution_date = date('Y-m-d', strtotime($distribution_date . "+" . $request->withdraw_policy. "months"));
        // //   $distribution_date = today()->addMin

        //     InvestmentDetails::create([
        //     'investment_id' => $investment->id,
        //     'distribution_date' =>  $distribution_date,
        //     'profit_amount' =>  $profit_amount,
        //     'status' =>  "due",
        //     ]);
        // }

        // view
        return redirect()->route('investment.index')->withSuccess("Investment has been update successfully.");
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
        $record = Investment::findOrFail($id);

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
        $records = Investment::onlyTrashed()->paginate($this->paginate);

        // view
        return view('investment.trash', compact('records'));
    }

    /**
     *
     */
    public function restore($id){
        // restore by id
        Investment::withTrashed()->find($id)->restore();

        // view
        return redirect()->back()->withSuccess('Investment has been restored.');
    }

     /**
     *
     */
    public function permanentDelete($id)
    {
        // Permanent delete by id
        Investment::withTrashed()->find($id)->forceDelete();

        // view
        return redirect()->back()->withSuccess('Investment has been deleted permanently.');
    }

     /**
     *
     */
    public function restoreOrDelete(Request $request)
    {
        if ($request->records != null) {
            if ($request->restore) {
                foreach ($request->records as $record) {
                    Investment::withTrashed()->find($record)->restore();
                }

                // view
                return redirect()->back()->withSuccess('Investment(s) has been restored.');
            } else {
                foreach ($request->records as $record) {
                    Investment::withTrashed()->find($record)->forceDelete();
                }

                // view
                return redirect()->back()->withSuccess('Investment(s) has been deleted permanently.');
            }
        }

        return back()->withErrors('No Investment(s) has been selected.');
    }
}
