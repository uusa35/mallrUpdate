<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CollectionLightResource;
use App\Http\Resources\CollectionResource;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->has('on_home') && request()->on_home) {
            $elements = Collection::active()->onHome()->whereHas('products' , function ($q) {
                return $q->active()->hasImage()->hasStock()->hasAtLeastOneCategory();
            },'>',0)->with('user')->orderBy('order', 'asc')->take(self::TAKE_MIN)->get();
        } else {
            $elements = Collection::active()->whereHas('products' , function ($q) {
                return $q->active()->hasImage()->hasStock()->hasAtLeastOneCategory();
            },'>',0)->with('user')->orderBy('order', 'asc')->take(self::TAKE_MIN)->get();
        }
        return response()->json(CollectionLightResource::collection($elements), 200);
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
        $element = Collection::whereId($id)->with(['products' => function ($q) {
            return $q->active()->hasStock()->hasImage()->hasAtLeastOneCategory();
        }])->with('user')->first();
        if ($element) {
            return response()->json(new CollectionResource($element), 200);
        }
        return response()->json(['message' => 'no such brand'], 400);
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
