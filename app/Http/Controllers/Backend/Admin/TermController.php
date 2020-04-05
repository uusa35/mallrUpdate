<?php

namespace App\Http\Controllers\Backend\Admin;


use App\Models\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Term::all();
        return view('backend.modules.term.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.term.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $element = Term::create($request->all());
        if ($element) {
            return redirect()->route('backend.admin.term.index')->with('success', trans('general.term_added'));
        }
        return redirect()->back()->with('error', trans('general.term_not_added'));
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
        $element = Term::whereId($id)->first();
        return view('backend.modules.term.edit', compact('element'));
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
        $element = Term::whereId($id)->first();
        if ($element) {
            $element->update($request->all());
            return redirect()->route('backend.term.index')->with('success', 'term added');
        }
        return redirect()->back()->with('error', 'term is not saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Term::whereId($id)->first();
        if ($element->delete()) {
            return redirect()->route('backend.term.index')->with('success', 'term deleted');
        }
        return redirect()->back()->with('error', 'term is not deleted.');
    }
}
