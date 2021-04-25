<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryWiseDuahApi extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($slug)
    {
        if ((int)$slug) {
            $category = Category::with('duahs')->findOrFail($slug);
        } else {
            $category = Category::with('duahs')->where('slug', $slug)->first();
        }
        return response()->json($category, Response::HTTP_OK);
    }
}
