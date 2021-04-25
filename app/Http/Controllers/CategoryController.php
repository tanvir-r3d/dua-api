<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\Slugger;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', "DESC")->paginate(20);
        return view("Pages.Category.index", compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.Category.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request, Category $category)
    {
        try {
            $requested_data = $request->all();
            $slugger = new Slugger($request->name);
            $slugger->checkSlug(Category::get());
            $requested_data['slug'] = $slugger->makeSlug();
            $category->fill($requested_data)->save();
            $notification = [
                'title'      => 'Category',
                'message'    => "Successfully Inserted.",
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($notification);
        } catch (\Exception $e) {
            return redirect()->back()->with($e->getMessage());
        }
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
        $category = Category::findOrFail($id);
        return view("Pages.Category.form", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $category->fill($request->all())->save();
            $notification = [
                'title'      => 'Category',
                'message'    => "Successfully Updated.",
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($notification);
        } catch (\Exception $e) {
            return redirect()->back()->with($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function status($id)
    {
        $category = Category::findOrFail($id);
        if ($category->status == 0) {
            $category->status = 1;
        } else {
            $category->status = 0;
        }
        $category->save();
        $notification = [
            'title'      => 'Category',
            'message'    => "Successfully status changed.",
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
}
