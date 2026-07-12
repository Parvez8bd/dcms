<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller {
    
    /**
     * Display the password reset view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request) {
        return view('settings.reset-password', ['request' => $request]);
    }
}
