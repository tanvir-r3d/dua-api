<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class SubcategoryApi extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $subcategories = Subcategory::with('category', 'duahs')->Search($request->search)
            ->orderBy($request->col ?? 'name', $request->order ?? 'ASC')
            ->get();

        if ($request->status == 1) {
            $subcategories =  $subcategories->where('status', 1);
        }
        if ($request->status && $request->status == 0) {
            $subcategories = $subcategories->where('status', 0);
        }
        if ($request->limit) {
            $subcategories = $subcategories->take($request->limit);
        }
        return response()->json($subcategories, Response::HTTP_OK);
    }
}
