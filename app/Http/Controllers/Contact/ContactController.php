<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacts\Contact;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ContactController extends Controller
{
    private $paginate = 25;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $contacts = Contact::paginate($this->paginate);
        $contacts_query = Contact::withoutTrashed();

        // search
        if (request()->owner_name) {
            $contacts_query->where('owner_name', 'LIKE', '%' . request()->owner_name . '%');
        }

        // paginate
        $contacts = $contacts_query->paginate($this->paginate);

        // view 
        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('contact.create', compact('countries'));
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
            'organigation_name' => 'nullable|string|max:100',
            'owner_name' => 'required|string|max:100',
            'fathers_name' => 'nullable|string|max:100',
            'mothers_name' => 'nullable|string|max:100',
            'gender' => 'required',
            'date_of_birth' => 'nullable|date_format:Y-m-d',
            'blood_group' => 'nullable',
            'religion' => 'nullable',
            'nid' => 'nullable|string|min:10|max:17',
            'country_id' => 'nullable',
            'contact_type' => 'required',
        ]);
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 1 to 9 digits 
        $pin = $characters[rand(0, strlen($characters) - 1)] . mt_rand(1, 9) ;

        // insert into user table
        $user = User::create([
            'name' => $request->owner_name,
            'email' => str_replace(' ', '_', $request->owner_name) . $pin . '@example.com',
            'password' => Hash::make('password'),
        ]);

        // insert into contact table
        $contact = $user->contact()->create($data);

        // return view with message
        $message = "Contact has been added successfully.";

        // call next form (Communication)
        if($request->submit == 'save_and_next') {
            return redirect()->route('communication.create', ['id' => $contact->id])->withSuccess($message);
        }

        return redirect()->back()->withSuccess($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::with('media','communications','addresses')->findOrFail($id);
        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::with('media')->findOrFail($id);
        $countries = Country::all();
        return view('contact.edit', compact('contact','countries'));
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
        $contact = Contact::with('media')->findOrFail($id);

        // validation
        $data = $request->validate([
            'organigation_name' => 'nullable|string|max:100',
            'owner_name' => 'required|string|max:100',
            'fathers_name' => 'nullable|string|max:100',
            'mothers_name' => 'nullable|string|max:100',
            'gender' => 'required',
            'date_of_birth' => 'nullable|date_format:Y-m-d',
            'blood_group' => 'required',
            'religion' => 'nullable',
            'nid' => 'required|string|min:10|max:17',
            'country_id' => 'nullable',
            'contact_type' => 'required',
        ]);
        $name=$contact->owner_name?? '';
        //update
        $contact->update($data);

        return redirect()->route('contact.index')->withSuccess("$name's information has been updated successfully.");
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
        $record = Contact::findOrFail($id);

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
        $records = Contact::onlyTrashed()->paginate($this->paginate);

        // view
        return view('contact.trash', compact('records'));
    }

    /**
     *
     */
    public function restore($id){
        // restore by id
        Contact::withTrashed()->find($id)->restore();

        // view
        return redirect()->back()->withSuccess('Contact has been restored.');
    }

     /**
     *
     */
    public function permanentDelete($id)
    {
        // Permanent delete by id
        Contact::withTrashed()->find($id)->forceDelete();

        // view
        return redirect()->back()->withSuccess('Contact has been deleted permanently.');
    }

     /**
     *
     */
    public function restoreOrDelete(Request $request)
    {
        if ($request->records != null) {
            if ($request->restore) {
                foreach ($request->records as $record) {
                    Contact::withTrashed()->find($record)->restore();
                }

                // view
                return redirect()->back()->withSuccess('Contact(s) has been restored.');
            } else {
                foreach ($request->records as $record) {
                    Contact::withTrashed()->find($record)->forceDelete();
                }

                // view
                return redirect()->back()->withSuccess('Contact(s) has been deleted permanently.');
            }
        }

        return back()->withErrors('No Contact(s) has been selected.');
    }
}
