<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Response;

class SubcategoryWiseDuahApi extends Controller
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
            $subcategory = Subcategory::with('duahs', 'category')->findOrFail($slug);
        } else {
            $subcategory = Subcategory::with('duahs', 'category')->where('slug', $slug)->first();
        }
        return response()->json($subcategory, Response::HTTP_OK);
    }
}
