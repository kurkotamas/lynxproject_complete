<?php

namespace App\Http\Controllers;

use App\UserTerm;
use Illuminate\Http\Request;

class UserTermController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UserTerm::create($request->all());
        return redirect( url()->previous());
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserTerm  $userTerm
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTerm $userTerm)
    {
        //
    }
}
