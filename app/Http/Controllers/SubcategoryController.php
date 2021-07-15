<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcategoryRequest;
use App\Models\Category;
use App\Models\Subcategory;
use App\Services\Slugger;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::orderBy('id', "DESC")->paginate(20);
        return view("Pages.Subcategory.index", compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 1)->orderBy('name', 'ASC')->get();
        return view('Pages.Subcategory.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryRequest $request, Subcategory $subcategory)
    {
        try {
            $requested_data = $request->all();
            $slugger = new Slugger($request->name);
            $slugger->checkSlug(Subcategory::get());
            $requested_data['slug'] = $slugger->makeSlug();
            $subcategory->fill($requested_data)->save();
            $notification = [
                'title'      => 'Subcategory',
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
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::where('status', 1)->orderBy('name', 'ASC')->get();
        return view("Pages.Subcategory.form", compact("subcategory", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        try {
            $subcategory->fill($request->all())->save();
            $notification = [
                'title'      => 'Subcategory',
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
        Subcategory::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function status($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        if ($subcategory->status == 0) {
            $subcategory->status = 1;
        } else {
            $subcategory->status = 0;
        }
        $subcategory->save();
        $notification = [
            'title'      => 'Subcategory',
            'message'    => "Successfully status changed.",
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
}
