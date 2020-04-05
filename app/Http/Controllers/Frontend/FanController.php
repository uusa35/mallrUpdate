<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Str;

class FanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $validate = validator(request()->all(), [
            'element_id' => 'required|exists:users,id',
            'model' => 'required|alpha'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->with('errors', $validate->errors());
        }
        $className = '\App\Models\\' . Str::title(request()->model);
        $element = new $className();
        $element = $element->withoutGlobalScopes()->whereId(request()->element_id)->with('fans')->first();
        $elements = $element->fans()->paginate(self::TAKE_MIN);
        return view('frontend.wokiee.four.modules.fan.index',compact('element','elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validate = validator(request()->all(), [
            'fan_id' => 'required|exists:users,id',
            'id' => 'required|numeric',
            'model' => 'required|alpha'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->with('errors', $validate->errors());
        }
        $className = '\App\Models\\' . Str::title(request()->model);
        $element = new $className();
        $element = $element->withoutGlobalScopes()->whereId(request()->id)->first();
        $element->fans()->toggle(request()->fan_id);
        return redirect()->back()->with('success', trans('message.process_success'));
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
