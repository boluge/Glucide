<?php

namespace Glucide\Http\Controllers;

use Glucide\User;
use Illuminate\Http\Request;

use Glucide\Http\Requests;
use Glucide\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function profile($id)
    {
        if( Auth::check() && Auth::user()->id == $id || Auth::check() && Auth::user()->roles == 'admin' ){
            $user = User::find($id);
            return view('users/profile')->with('user', $user);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $parameters = $request->except(['_token']);
        //dd($request->all());
        if(strlen($parameters['password']) == 0){
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users,email,'.$id.'|max:100',
                'corrective' => 'required',
                'prandial' => 'required',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users,email,'.$id.'|max:100',
                'corrective' => 'required',
                'prandial' => 'required',
                'password' => 'required|confirmed|min:6',
            ]);
        }

        if($validator->fails()) {
            return redirect()->route('profile',['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        $user->email = $parameters['email'];
        $user->corrective = $parameters['corrective'];
        $user->prandial = $parameters['prandial'];

        if(strlen($parameters['password']) != 0){
            $user->password = bcrypt($parameters['password']);
        }
        $user->save();

        return redirect()->route('profile',['id' => $id])->with('success', 'Your profile was updated !');
    }
}
