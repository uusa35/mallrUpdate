<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Service;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', 'video');
        $elements = Video::all();
        if (isset($elements) && $elements->isNotEmpty()) {
            return view('backend.modules.video.index', compact('elements'));
        }
        return redirect()->back()->with('error', trans('message.no_videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::active()->available()->hasImage()->serveCountries()->hasStock()->get();
        return view('backend.modules.video.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = validator($request->all(), [
            'name_ar' => 'required|min:3',
            'name_en' => 'required|min:3',
            'image' => 'image|nullable|dimensions:width=1440,height=1080',
            'url' => 'required|url',
            'order' => 'numeric|nullable',
            'on_home' => 'boolean',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput(Input::all());
        }
        $element = Video::create($request->request->all());
        if ($element) {
            $request->hasFile('image') ? $this->saveMimes($element, $request, ['image'], ['1440', '1080'], true) : null;
            $request->has('products') ? $element->products()->sync($request->products) : null;
            return redirect()->route('backend.video.index')->with('success', trans('message.store_success'));
        }
        return redirect()->back()->with('error', trans('message.store_error'));
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
        $element = Video::whereId($id)->with('products')->first();
        $this->authorize('video.update', $element);
        $products = Product::active()->available()->hasImage()->serveCountries()->hasStock()->get();
        return view('backend.modules.video.edit', compact('element','products'));
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
        $validate = validator($request->all(), [
            'name_ar' => 'required|min:3',
            'name_en' => 'required|min:3',
            'image' => 'image|nullable|dimensions:width=1440,height=1080',
            'url' => 'required|url',
            'order' => 'numeric|nullable',
            'on_home' => 'boolean',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput(Input::all());
        }
        $element = Video::whereId($id)->first();
        if ($element->update($request->request->all())) {
            $request->has('products') ? $element->products()->sync($request->products) : null;
            $request->hasFile('image') ? $this->saveMimes($element, $request, ['image'], ['1440', '1080'], true) : null;
            return redirect()->route('backend.video.index')->with('success', trans('message.store_success'));
        }
        return redirect()->back()->with('error', trans('message.store_error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Video::whereId($id)->first()->delete()) {

            return redirect()->route('backend.video.index')->with('success', 'successful');

        }
        return redirect()->back()->with('error', 'not successful !!');
    }
}
