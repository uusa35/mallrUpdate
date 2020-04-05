<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Brand::all();
        return view('backend.modules.brand.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.brand.create');
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
            'name' => 'required|min:3|unique:brands,name',
            'slug_ar' => 'required|min:3',
            'slug_en' => 'required|min:3',
            'on_home' => 'required|boolean',
            'image' => 'required|image|dimensions:width=500,height=500',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput(Input::all());
        }
        $element = Brand::create($request->all());
        if ($element) {
            $request->hasFile('image') ? $this->saveMimes($element, $request, ['image'], ['500', '500'], true) : null;
            return redirect()->route('backend.admin.brand.index')->with('success', trans('message.brand_saved_successfully'));
        }
        return redirect()->back()->with('error', 'not created !!');
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
        $element = Brand::whereId($id)->first();

        return view('backend.modules.brand.edit', compact('element'));
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
            'name' => 'required|min:3|unique:brands,name,' . $id,
            'slug_ar' => 'required|min:3',
            'slug_en' => 'required|min:3',
            'on_home' => 'required|boolean',
            'image' => 'required|image|dimensions:width=500,height=500',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput(Input::all());
        }
        $element = Brand::whereId($id)->first();
        if ($element->update($request->all())) {
            $request->hasFile('image') ? $this->saveMimes($element, $request, ['image'], ['500', '500'], true) : null;
            return redirect()->route('backend.admin.brand.index')->with('success', 'created successfully!!');
        }
        return redirect()->back()->with('error', 'not created !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Brand::whereId($id)->first()->delete()) {

            return redirect()->route('backend.admin.brand.index')->with('success', 'successful');

        }
        return redirect()->back()->with('error', 'not successful !!');
    }
}
