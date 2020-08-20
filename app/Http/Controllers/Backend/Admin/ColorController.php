<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Requests;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Color::all();
        return view('backend.modules.color.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $element = Color::create($request->request->all());
        if ($element) {
            return redirect()->route('backend.admin.color.index')->with('success', trans('general.color_added'));
        }
        return redirect()->back()->with('error', trans('general.color_not_added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = Color::whereId($id)->first();
        return view('backend.modules.color.edit', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $element = Color::whereId($id)->first()->update($request->request->all());
        return redirect()->route('backend.admin.color.index')->with('success', 'color updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $element = Color::whereId($id)->first();
            if ($element->products()->get()->isEmpty()) {
                $element->delete();
                return redirect()->route('backend.admin.color.index')->with('success', 'color deleted');
            }
            return redirect()->route('backend.admin.color.index')->with('error', 'color not deleted, some products using this color.');
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
