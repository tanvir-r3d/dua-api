<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Response;

class CategoryWiseSubcategoryApi extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $category = Category::with('subcategories', 'subcategories.duahs')->findOrFail($id);
        return response()->json($category, Response::HTTP_OK);
    }
}
