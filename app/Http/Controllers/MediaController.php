<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts\Contact;
use App\Models\Media;

class MediaController extends Controller
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
        return view('media.create');
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
        $request->validate([
            'contact_id' => 'required',
            'media' => 'required|image|mimes:jpeg,png,jpg|max:300'
        ]);

        // insert media
        $media = Media::create([
            'path' => $request->file('media')->store('media', 'public'),
            'mime_type' => $request->file('media')->getMimeType(), // or, mime_content_type($request->file('media'))
            'size' => $request->file('media')->getSize(),
            'media_type' => $request->contact_media_type,
        ]);

        // mediable 
        if($request->contact_id != null) {
            // get contact
            $contact = Contact::findOrFail($request->contact_id);

            $contact->media()->attach([
                $media->id => [
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        // set message
        $message = "Media has been uploaded successfully.";

        // call next form (media)
        if($request->submit == 'finish') {
            return redirect()->route('contact.index')->withSuccess($message);
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
        // mediable 
        // if($request->contact_id != null) {
        //     // get contact
        //     $contact = Contact::findOrFail($request->contact_id);

        //     $contact->media()->sync([
        //         $media->id => [
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ],
        //     ]);
        // }
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
