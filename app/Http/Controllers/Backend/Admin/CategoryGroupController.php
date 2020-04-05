<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Requests\Backend\CategoryGroupStore;
use App\Http\Requests\Backend\CategoryGroupUpdate;
use App\Models\Area;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryGroup;
use App\Models\Property;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class CategoryGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', 'group');
        $elements = request()->has('category_id')
            ? Category::whereId(request()->category_id)->first()->categoryGroups()->get()
            : CategoryGroup::with('categories', 'properties')->get();
        return view('backend.modules.group.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('group.create');
        $properties = Property::active()->get();
        $categories = Category::active()->onlyForClassifieds()->with('children.children')->get();
        return view('backend.modules.group.create', compact('properties','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryGroupStore $request)
    {
        $element = CategoryGroup::create($request->except('properties','categories'));
        if ($element) {
            $request->hasFile('image') ? $this->saveMimes($element, $request, ['image'], ['500', '500'], true) : null;
            $request->has('properties') ? $element->properties()->sync($request->properties) : null;
            $request->has('categories') ? $element->categories()->sync($request->categories) : null;
            return redirect()->route('backend.admin.group.index')->with('success', trans('general.group_saved'));
        }
        return redirect()->back()->with('error', trans('general.group_not_saved'));
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
        $element = CategoryGroup::whereId($id)->with('properties')->first();
        $this->authorize('group.update', $element);
        $properties = Property::active()->get();
        $categories = Category::active()->onlyForClassifieds()->with('children.children')->get();
        return view('backend.modules.group.edit', compact('element','categories', 'properties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryGroupUpdate $request, $id)
    {
        $element = CategoryGroup::whereId($id)->first();
        $element->update($request->except('properties','categories'));
        if ($element) {
            $request->hasFile('image') ? $this->saveMimes($element, $request, ['image'], ['500', '500'], true) : null;
            $request->has('categories') ? $element->categories()->sync($request->categories) : null;
            $request->has('properties') ? $element->properties()->sync($request->properties) : null;
            return redirect()->route('backend.admin.group.index')->with('success', trans('general.group_saved'));
        }
        return redirect()->back()->with('error', trans('general.group_not_saved'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = CategoryGroup::whereId($id)->first();
        if ($element->delete()) {
            return redirect()->route('backend.admin.group.index')->with('success', trans('message.success_group_delete'));
        }
        return redirect()->back()->with('error', trans('message.failure_group_delete'));
    }
}
