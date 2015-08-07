<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Contracts\Pagination;

class CategoryController extends Controller
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
        $categories = DB::table('categories')->get();

        /*
           SELECT a.id,a.catagory_name,b.id as sucid,b.subcatagory_name
            FROM category a
            LEFT JOIN subcategory b ON a.id = b.catagory_id
            WHERE a.active='y' AND b.active='y'
            ORDER BY a.priority,b.category_id DESC
        */
        return view('foodcategories/index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $parents = Categories::all(['id', 'name']);
        return view('foodcategories/create');
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
            'slug' => 'max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->route('category.create')
                ->withErrors($validator)
                ->withInput();
        }

        $parameters = $request->except(['_token']);

        if( empty($parameters['slug']) ){
            $parameters['slug'] = Str::slug($parameters['name']);
        }

        $category = new Categories();
        $category->name = $parameters['name'];
        $category->slug = $parameters['slug'];

        $category->save();

        return redirect()->route('category.index')->with('success', 'Item was added !');
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
        $category = Categories::find($id);
        return view('foodcategories/create')->with('category', $category);
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
