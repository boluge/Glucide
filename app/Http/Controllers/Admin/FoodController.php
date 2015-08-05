<?php

namespace App\Http\Controllers\Admin;

use App\Foods;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $foods = Foods::all();
        $foods = $foods->sortBy('name');
        return view('foods/index')->with('foods', $foods);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('foods/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
        //var_dump($food);
        //die;
        return view('foods/create')->with('food',$food);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}