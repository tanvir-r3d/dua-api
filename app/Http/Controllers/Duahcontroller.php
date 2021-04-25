<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Duah;
use App\Services\Slugger;
use Illuminate\Http\Request;

class Duahcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $duahs = Duah::with('category')->orderBy('id', "DESC")->paginate(20);
        return view("Pages.Duah.index", compact('duahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy("name")->get();
        return view("Pages.Duah.from", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $requested_data = $request->all();
            $slugger = new Slugger($request->title);
            $slugger->checkSlug(Duah::get());
            $requested_data['slug'] = $slugger->makeSlug();
            (new Duah())->fill($requested_data)->save();
            $notification = [
                'title'      => 'Duah',
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
        $duah = Duah::findOrFail($id);
        $categories = Category::orderBy("name")->get();
        return view("Pages.Duah.from", compact('categories', 'duah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Duah $duah)
    {
        try {
            $duah->fill($request->all())->save();
            $notification = [
                'title'      => 'Duah',
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
        Duah::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function status($id)
    {
        $duah = Duah::findOrFail($id);
        if ($duah->status == 0) {
            $duah->status = 1;
        } else {
            $duah->status = 0;
        }
        $duah->save();
        $notification = [
            'title'      => 'Duah',
            'message'    => "Successfully status changed.",
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
}
