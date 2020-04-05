<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ClassifiedExtraLightResource;
use App\Http\Resources\ProductExtraLightResource;
use App\Http\Resources\ProductLightResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $element = request()->user();
        $elements = $element->product_favorites()->hasStock()->hasImage()->available()->get();
        if ($elements->isNotEmpty()) {
            return response()->json(ProductLightResource::collection($elements), 200);
        }
        return response()->json(['message' => trans('empty')], 400);
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
        $element = request()->user();
        if ($request->has('product_id')) {
            $element->product_favorites()->toggle([$request->product_id]);
            $elements = $element->product_favorites()->active()->hasImage()->hasStock()->hasAtLeastOneCategory()->available()->get();
            return response()->json(ProductExtraLightResource::collection($elements), 200);
        } elseif ($request->has('classified_id')) {
            $element->classified_favorites()->toggle([$request->classified_id]);
            $elements = $element->classified_favorites()->active()->available()->notExpired()->hasImage()->get();
            return response()->json(ClassifiedExtraLightResource::collection($elements), 200);
        }
        return response()->json(['message' => trans('message.no_favorites')], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
