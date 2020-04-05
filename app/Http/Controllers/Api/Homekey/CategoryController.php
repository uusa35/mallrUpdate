<?php

namespace App\Http\Controllers\Api\Homekey;

use App\Http\Resources\CategoryLightResource;
use App\Http\Resources\UserLightResource;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Category::active()->onlyParent()->onHome()->with(['children' => function ($q) {
            return $q->active()->with(['children' => function ($q) {
                return $q->active();
            }]);
        }])->orderBy('order','asc')->get();
        return response()->json(CategoryLightResource::collection($elements), 200);
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
        $elements = Category::whereId($id)->active()->users()->orderBy('order', 'desc')->get();
        if ($elements->isNotEmpty()) {
            return response()->json(UserLightResource::collection($elements), 200);
        }
        return response()->json(['message' => trans('message.no_users'), 400]);
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
