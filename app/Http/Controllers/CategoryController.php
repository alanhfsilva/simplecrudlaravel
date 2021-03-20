<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('web.sections.category.index', compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.sections.category.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            ['name' => 'required|min:2|max:100']
        );

        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        return redirect("/categories");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if(isset($category))
        {
            return view("web.sections.category.edit",compact('category'));
        }
        return redirect('/categories');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [   'name' => [
                    'required',
                    'min:2',
                    'max:100',
                    Rule::unique('categories')->ignore($id),
                ]
            ]
        );

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect("/categories");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if(isset($category))
        {
            $category->delete();
        }
        return redirect("/categories");
    }
    
    /**
     * Display a listing of the resource in json format.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexJson()
    {
        $categories = Category::orderBy('name')->get();
        return $categories->toJson();
    }
}