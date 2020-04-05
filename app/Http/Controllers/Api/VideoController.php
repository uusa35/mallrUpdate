<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductExtraLightResource;
use App\Http\Resources\VideoLightResource;
use App\Http\Resources\VideoResource;
use App\Models\Product;
use App\Models\Video;
use App\Services\Search\Filters;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->has('on_home') && request()->on_home) {
            $elements = Video::active()->onHome()->orderby('order', 'asc')->take(self::TAKE_LESS)->get();
        } else {
            $elements = Video::active()->orderBy('order', 'asc')->take(self::TAKE_LESS)->get();
        }
        if ($elements->isNotEmpty()) {
            return response()->json(VideoLightResource::collection($elements), 200);
        }
        return response()->json(['message' => trans('message.no_videos')], 400);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $element = Video::whereId($id)->with(['products' => function ($q) {
            return $q->hasStock()->hasImage()->available()->hasAtLeastOneCategory();
        }])->first();
        if($element) {
            return response()->json(VideoResource::make($element),200);
        }
        return response()->json(['message' => trans('message.no_video')], 400);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
