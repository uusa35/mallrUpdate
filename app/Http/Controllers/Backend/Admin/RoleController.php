<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Privilege;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', 'role');
        $elements = Role::all();
        return view('backend.modules.role.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('role.create');
        return view('backend.modules.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('role.create');
        $element = Role::create($request->all());
        if ($element) {
            return redirect()->route('backend.admin.role.index')->with('success', 'role saved.');
        }
        return redirect()->back()->with('error', 'unknown error');
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
        $element = Role::whereId($id)->first();
        $privileges = Privilege::with('roles')->get();
        $this->authorize('role.update', $element);
        return view('backend.modules.role.edit', compact('element', 'privileges'));
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
        $element = Role::whereId($id)->first();
        $element->update($request->except('privileges'));
        if($request->has('privileges')) {
            $removedIds = Privilege::whereNotIn('id',$request->privileges)->get()->pluck('id')->toArray();
            $privileges = Privilege::all();
            $element->privileges()->sync($privileges);
            $element->privileges()->updateExistingPivot($request->privileges, ['index' => true, 'view' => true, 'create' => true, 'update' => true, 'delete' => true]);
            $element->privileges()->updateExistingPivot($removedIds, ['index' => false, 'view' => false, 'create' => false, 'update' => false, 'delete' => false]);
        }
        return redirect()->route('backend.admin.role.index')->with('success', 'role updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
