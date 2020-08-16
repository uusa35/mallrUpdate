<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Page::all();
        return view('backend.modules.page.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = validator($request->request->all(), [
            'title_ar' => 'required|min:3:max:100',
            'title_en' => 'required|min:3:max:100',
            'slug_ar' => 'required|min:3:max:100',
            'slug_en' => 'required|min:3:max:100',
            'url' => 'url|nullable',
            'content_ar' => 'required|min:100',
            'content_en' => 'required|min:100',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $element = Page::create($request->request->all());
        if ($element) {
            $request->hasFile('image') ? $this->saveMimes($element, $request, ['image'], ['1080', '1440'], true) : null;
            return redirect()->route('backend.admin.page.index')->with('success', 'page saved.');
        }
        return redirect()->back()->with('error', 'error .. please try again');
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
        $element = Page::whereId($id)->first();
        return view('backend.modules.page.edit', compact('element'));
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
        $validate = validator($request->request->all(), [
            'title_ar' => 'required|min:3:max:100',
            'title_en' => 'required|min:3:max:100',
            'slug_ar' => 'required|min:3:max:100',
            'slug_en' => 'required|min:3:max:100',
            'url' => 'url|nullable',
            'content_ar' => 'required|min:100',
            'content_en' => 'required|min:100',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $element = Page::whereId($id)->first();
        $updated = $element->update($request->request->all());
        if ($updated) {
            $request->hasFile('image') ? $this->saveMimes($element, $request, ['image'], ['1080', '1440'], true) : null;
            return redirect()->route('backend.admin.page.index')->with('success', 'page updated.');
        }
        return redirect()->back()->with('error', 'error .. please try again');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Page::whereId($id)->first();
        if ($element->delete()) {
            return redirect()->back()->with('success', 'page deleted');
        }
        return redirect()->back()->with('success', 'page is not deleted.');
    }
}
