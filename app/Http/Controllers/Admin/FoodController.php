<?php

namespace Glucide\Http\Controllers\Admin;

use Glucide\Foods;
use Illuminate\Http\Request;

use Glucide\Http\Requests;
use Glucide\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Contracts\Pagination;

class FoodController extends Controller
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
        $foods = Foods::all(['id', 'name', 'category_id', 'weight', 'sugar'])->sortBy('name');
        //$foods = DB::table('foods')->paginate(2);
        //$foods = $foods->shortby('name');
        //$foods = $foods->paginate(2);
        return view('foods/index')->with('foods', $foods);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('foods/create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:foods|max:255',
            'slug' => 'max:255',
            'weight' => 'required|boolean',
            'sugar' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->route('food.create')
                ->withErrors($validator)
                ->withInput();
        }
        $parameters = $request->except(['_token']);

        if( empty($parameters['slug']) ){
            $parameters['slug'] = Str::slug($parameters['name']);
        }

        $food = new Foods();
        $food->name = $parameters['name'];
        $food->slug = $parameters['slug'];
        $food->category_id = $parameters['category_id'];
        $food->weight = $parameters['weight'];
        $food->sugar = $parameters['sugar'];

        $food->save();

        return redirect()->route('food.index')->with('success', 'Item was added !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $food = Foods::find($id);
        $categories = DB::table('categories')->get();
        return view('foods/create')->with('food',$food)->with('categories', $categories);
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
        $food = Foods::find($id);
        $parameters = $request->except(['_token']);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:foods,name,'.$id.'|max:255',
            'slug' => 'max:255',
            'weight' => 'required|boolean',
            'sugar' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->route('food.create')
                ->withErrors($validator)
                ->withInput();
        }

        if( empty($parameters['slug']) ){
            $parameters['slug'] = Str::slug($parameters['name']);
        }

        $food->name = $parameters['name'];
        $food->slug = $parameters['slug'];
        $food->category_id = $parameters['category_id'];
        $food->weight = $parameters['weight'];
        $food->sugar = $parameters['sugar'];

        $food->save();

        return redirect()->route('food.index')->with('success', 'Food was updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $food = Foods::find($id);
        $food->delete();

        return redirect()->route('food.index')->with('success', 'Food was deleted !');
    }
}
