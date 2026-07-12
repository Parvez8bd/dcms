<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacts\Contact;
use App\Models\Contacts\Address;
use App\Models\Location\Division;

class AddressController extends Controller
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
         $divisions = Division::all();
        return view('contact.address.create', compact('divisions'));
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
            'contact_id' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'nullable',
            'union_id' => 'nullable',
            'address' => 'nullable',
            'contact_address_type' => 'required',
        ]);

        // insert into address table
        $address = Address::create($data);

        // insert address into address table one more time
        if($request->contact_address_confirmation == 'on') {
            $data['contact_address_type'] = ($request->contact_address_type == 'Present address') ? 'Permanent address' : 'Present address';
            Address::create($data);
        }

        // set message
        $message = "Address details has been added successfully.";

        // call next form (media)
        if($request->submit == 'save_and_next') {
            return redirect()->route('media.create', ['id' => $request->contact_id])->withSuccess($message);
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
