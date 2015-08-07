<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
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
        if( Auth::check() && Auth::user()->id == $id ){
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
        $category = Categories::find($id);
        $parameters = $request->except(['_token']);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:foods|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->route('food.create')
                ->withErrors($validator)
                ->withInput();
        }

        if( empty($parameters['slug']) ){
            $parameters['slug'] = Str::slug($parameters['name']);
        }

        $category->name = $parameters['name'];
        $category->slug = $parameters['slug'];

        $category->save();

        return redirect()->route('category.index')->with('success', 'Category was updated !');
    }
}
