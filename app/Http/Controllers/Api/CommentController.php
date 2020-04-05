<?php

namespace App\Http\Controllers\Api;

use \Illuminate\Support\Str;
use App\Http\Resources\CommentExtraLightResource;
use App\Http\Resources\UserLightResource;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $validate = validator(request()->all(), [
            'model' => 'alpha|required|min:3',
            'id' => 'required|numeric'
        ]);
        if($validate->fails()) {
            return response()->json(['message' => $validate->errors()->first()],400);
        }
        $className = '\App\Models\\' . Str::title(request()->model);
        $element = new $className();
        $element = $element->withoutGlobalScopes()->whereId(request()->id)->first();
        $elements = $element->comments()->with('owner')->paginate(self::TAKE_MID);
        return response()->json(CommentExtraLightResource::collection($elements),200);

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
        $validate = validator($request->all(),[
            'title' => 'required|min:3',
            'content' => 'required|min:3|max:500',
            'model' => 'required|alpha',
            'id' => 'required|numeric'
        ]);
        if($validate->fails()) {
            return response()->json(['message' => $validate->errors()->first()],400);
        }
        $className = '\App\Models\\' . Str::title(request()->model);
        $element = new $className();
        $element = $element->withoutGlobalScopes()->whereId(request()->id)->first();
        $request->request->add(['user_id' => $request->user()->id]);
        $element = $element->comments()->create($request->except('id','model'));
        return response()->json(CommentExtraLightResource::make($element),200);

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
