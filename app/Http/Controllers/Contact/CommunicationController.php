<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacts\Contact;
use App\Models\Contacts\Communication;
use App\Models\User;

class CommunicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact = Contact::findOrFail(request()->id);
        return view('contact.communication.create', compact('contact'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // update user table
        if($request->contact_number_type == "Email") {
            if($request->is_primary == 1) {
                // get contact
                $contact = Contact::findOrFail($request->contact_id);

                // validation
                $request->validate([
                    'contact' => 'required|string|max:100',
                ]);

                User::where('id', $contact->user_id)->update([
                    'email' => $request->contact,
                ]);
            }
        }

        // validation
        $data = $request->validate([
            'contact_id' => 'required',
            'contact' => 'required|string|max:100',
            'is_primary' => 'nullable',
            'contact_number_type' => 'required',
        ]);

        // insert into communication table
        $communication = Communication::create($data);

        // set message
        $message = "Communication details has been added successfully.";

        // call next form (Address)
        if($request->submit == 'save_and_next') {
            return redirect()->route('address.create', ['id' => $request->contact_id])->withSuccess($message);
        }

        // return view 
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
        //
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
        //
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
