<?php

namespace App\Http\Controllers\Api;

use App\Models\Duah;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class DuahDetailsApi extends Controller
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
            $duah = Duah::with('category')->findOrFail($slug);
        } else {
            $duah = Duah::with('category')->where('slug', $slug)->first();
        }
        return response()->json($duah, Response::HTTP_OK);
    }
}
