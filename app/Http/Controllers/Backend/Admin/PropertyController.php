<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Requests\Backend\PropertyStore;
use App\Http\Requests\Backend\PropertyUpdate;
use App\Models\Classified;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', 'property');
        $elements = Property::with('categoryGroups')->get();
        return view('backend.modules.property.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('property.create');
        return view('backend.modules.property.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyStore $request)
    {
        $element = Property::create($request->request->all());
        if ($element) {
            $request->hasFile('image') ? $this->saveMimes($element, $request, ['image'], ['150', '150'], true) : null;
            return redirect()->route('backend.admin.property.index')->with('success', trans('general.property_saved'));
        }
        return redirect()->back()->with('error', trans('general.property_not_saved'));
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
        $element = Property::whereId($id)->first();
        $this->authorize('property.update', $element);
        return view('backend.modules.property.edit', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyUpdate $request, $id)
    {
        $element = Property::whereId($id)->first();
        if ($element->update($request->request->all())) {
            $request->hasFile('image') ? $this->saveMimes($element, $request, ['image'], ['150', '150'], true) : null;
            return redirect()->route('backend.admin.property.index')->with('success', trans('general.property_saved'));
        }
        return redirect()->back()->with('error', trans('general.property_not_saved'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Property::whereId($id)->first();
        if ($element->delete()) {
            return redirect()->route('backend.admin.property.index')->with('success', trans('message.success_property_delete'));
        }
        return redirect()->back()->with('error', trans('message.failure_property_delete'));
    }
}
