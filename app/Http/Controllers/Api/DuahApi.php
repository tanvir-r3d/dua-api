<?php

namespace App\Http\Controllers\Api;

use App\Models\Duah;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class DuahApi extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $duahs = Duah::with("category")->Search($request->search)
            ->orderBy($request->col ?? 'title', $request->order ?? 'ASC')
            ->get();

        if ($request->status == 1) {
            $duahs =  $duahs->where('status', 1);
        }
        if ($request->status && $request->status == 0) {
            $duahs = $duahs->where('status', 0);
        }
        if ($request->limit) {
            $duahs = $duahs->take($request->limit);
        }
        return response()->json($duahs, Response::HTTP_OK);
    }
}
