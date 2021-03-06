<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index','area');
        $elements = Area::all();
        return view('backend.modules.area.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('area.create');
        $countries = Country::active()->get();
        return view('backend.modules.area.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('area.create');
        $element = Area::create($request->all());
        if ($element) {
            return redirect()->route('backend.admin.area.index')->with('success', trans('general.area_added'));
        }
        return redirect()->back()->with('error', trans('general.area_not_added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = Area::whereId($id)->first();
        $this->authorize('area.update', $element);
        $countries = Country::active()->get();
        return view('backend.modules.area.edit', compact('element', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $element = Area::whereId($id)->first();
        $updated = $element->update($request->all());
        if($updated) {
            return redirect()->route('backend.admin.area.index')->with('success', 'Area updated');
        }
        return redirect()->back()->with('error', 'Area Not updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Area::whereId($id)->first();
        if($element->delete()) {
            return redirect()->route('backend.admin.area.index')->with('success', 'Area deleted');
        }
        return redirect()->back()->with('error', 'Area not deleted');
    }
}
