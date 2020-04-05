<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\BrandLightResource;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->has('on_home') && request()->on_home) {
            $elements = Brand::active()->onHome()->has('products', '>', 0)->orderBy('order', 'asc')->get();
        } else {
            $elements = Brand::active()->has('products', '>', 0)->orderBy('order', 'asc')->get();
        }
        return response()->json(BrandLightResource::collection($elements), 200);
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
        $element = Brand::whereId($id)->with(['products' => function ($q) {
            return $q->active();
        }])->first();
        if ($element) {
            return response()->json(new BrandResource($element), 200);
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
