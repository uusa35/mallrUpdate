<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Policy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Policy::all();
        return view('backend.modules.policy.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.policy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $element = Policy::create($request->all());
        if ($element) {
            return redirect()->route('backend.policy.index')->with('success', trans('general.policy_added'));
        }
        return redirect()->back()->with('error', trans('general.policy_not_added'));
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
        $element = Policy::whereId($id)->first();
        return view('backend.modules.policy.edit', compact('element'));
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
        $element = Policy::whereId($id)->first();
        if ($element) {
            $element->update($request->all());
            return redirect()->route('backend.policy.index')->with('success', 'Policy added');
        }
        return redirect()->back()->with('error', 'Policy is not saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Policy::whereId($id)->first();
        if ($element->delete()) {
            return redirect()->route('backend.policy.index')->with('success', 'Policy deleted');
        }
        return redirect()->back()->with('error', 'Policy is not deleted.');
    }
}
