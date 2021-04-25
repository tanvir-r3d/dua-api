<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class CategoryApi extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $categories = Category::Search($request->search)
            ->orderBy($request->col ?? 'name', $request->order ?? 'ASC')
            ->get();

        if ($request->status == 1) {
            $categories =  $categories->where('status', 1);
        }
        if ($request->status && $request->status == 0) {
            $categories = $categories->where('status', 0);
        }
        if ($request->limit) {
            $categories = $categories->take($request->limit);
        }
        return response()->json($categories, Response::HTTP_OK);
    }
}
