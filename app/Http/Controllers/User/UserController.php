<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user)
    {
//        return $request->all();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users,email, ' . $user->id],
            'phone' => ['required', 'numeric', 'unique:users,phone, ' . $user->id],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/']
        ]);
        $request['password'] = Hash::make($request->password);
        $user->email = $request['email'];

        if($user->isDirty()){
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        }
        $user->update($request->all());
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'success' => 'User deleted successfully!'
        ]);
    }

    public function unverify(User $user)
    {
        $user->email_verified_at = null;
        $user->update();
        return redirect('home');
    }
}
