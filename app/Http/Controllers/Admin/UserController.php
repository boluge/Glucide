<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if( Auth::check() && Auth::user()->roles == 'admin' ){
            $users = User::all(['id', 'firstname', 'name', 'email', 'roles', 'created_at'])->sortBy('name');
            return view('users/index')->with('users', $users);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
}
