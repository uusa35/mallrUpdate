<?php

namespace App\Http\Controllers\Backend\Admin;


use App\Models\Category;
use App\Models\Commercial;
use Illuminate\Http\Request;
use App\Core\PrimaryController;
use App\Core\Services\Image\PrimaryImageService;

use App\Http\Controllers\Controller;

use App\Http\Requests;

class CommercialController extends Controller
{
    public $commercial;
    public $image;

    public function __construct(Commercial $commercial)
    {
        $this->commercial = $commercial;
        //$this->image = $image;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commercials = $this->commercial->all();
        return view('backend.modules.commercial.index', compact('commercials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::active()->onlyParent()->with('children.children')->get();
        return view('backend.modules.commercial.create', compact('categories'));
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
            'on_home' => 'required|boolean',
            'order' => 'numeric|min:1',
            'image' => 'required|image|dimensions:width=930,height=365',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }
        $element = Commercial::create($request->except(['image', 'path', 'categories']));
        if ($element) {
            $request->hasFile('image') ? $this->saveMimes($element, $request, ['image'], ['930', '365'], true) : null;
            $request->hasFile('path') ? $this->savePath($request, $element) : null;
            $request->has('categories') ? $element->categories()->sync($request->categories) : null;
            return redirect()->route('backend.admin.commercial.index')->with('success', trans('general.commercial_added'));
        }
        return redirect()->back()->with('error', trans('general.commercial_not_added'));
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
        $element = Commercial::whereId($id)->first();
        if ($element) {
            $categories = Category::active()->onlyParent()->with('children.children')->get();
            return view('backend.modules.commercial.edit', compact('element', 'categories'));
        }
        return redirect()->back()->with('error', trans('general.commercial_not_added'));
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
            'on_home' => 'required|boolean',
            'order' => 'numeric|min:1',
            'image' => 'image|dimensions:width=930,height=365',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }
        $element = Commercial::whereId($id)->first();
        $updated = $element->update($request->except(['image', 'path', 'categories']));
        if ($updated) {
            $request->hasFile('image') ? $this->saveMimes($element, $request, ['image'], ['930', '365'], true) : null;
            $request->hasFile('path') ? $this->savePath($request, $element) : null;
            $request->has('categories') ? $element->categories()->sync($request->categories) : null;
            return redirect()->route('backend.admin.commercial.index')->with('success', trans('general.commercial_added'));
        }
        return redirect()->back()->with('error', trans('general.commercial_not_added'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Commercial::whereId($id)->with('categories')->first();
        if ($element->categories->isNotEmpty()) {
            $element->categories()->sync($element->categories->pluck('id')->toArray());
        }
        if ($element->delete()) {
            return redirect()->route('backend.commercial.index')->with('success', 'commercial Deleted Successfully!');
        }
        return redirect()->back()->with('error', 'System Error!!');
    }
}
