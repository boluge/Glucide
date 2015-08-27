<?php

namespace Glucide\Http\Controllers\Admin;

use Gbrock\Table\Facades\Table;
use Glucide\User;

use Glucide\Http\Requests;
use Glucide\Http\Controllers\Controller;
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
            $users = User::sorted()->paginate(20);
            $users = Table::create($users, ['id','firstname', 'name', 'email']);
            $users->addColumn('roles', 'Roles', function($model) {
                if($model->roles == 'admin'){
                    $icon = "<i class='material-icons'>build</i>";
                } else {
                    $icon = "<i class='material-icons'>face</i>";
                }
                return $icon;
            });
            $users->addColumn('created_at', 'Depuis', function($model) {
                return $model->created_at->format('d M Y - H:i');
            });
            $users->addColumn('id', 'Editer', function($model) {
                $url = route('profile', ['id' => $model->id]);
                echo "<a href='$url'><i class='material-icons'>create</i></a>";
            });
            return view('users/index')->with('users', $users);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
}
