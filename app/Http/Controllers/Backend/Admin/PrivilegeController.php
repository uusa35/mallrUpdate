<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Privilege;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrivilegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', 'privilege');
        $elements = Privilege::with('roles')->get();
        return view('backend.modules.privilege.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('privilege.create');
        $roles = Role::with('privileges')->get();
        return view('backend.modules.privilege.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = validator(request()->all(), ['roles' => 'required|array', 'name' => 'required']);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $element = Privilege::create($request->except('index', 'view', 'create', 'update', 'delete', 'roles'));
        if ($element) {
            $roles = Role::whereIn('id', $request->roles)->get();
            foreach ($roles as $role) {
                $role->privileges()->attach($element, [
                    'index' => $request->index,
                    'view' => $request->view,
                    'create' => $request->create,
                    'update' => $request->update,
                    'delete' => $request->delete,
                ]);
            }
            return redirect()->route('backend.admin.privilege.index')->with('success', 'privilege saved.');
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
        $element = Privilege::whereId($id)->with('roles')->first();
        $this->authorize('privilege.view', $element);
        return view('backend.modules.privilege.show', compact('element'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = Privilege::whereId($id)->with('roles')->first();
        $this->authorize('privilege.update', $element);
        $roles = Role::active()->get();
        $role = request()->has('role_id') ? $element->roles->where('id', request('role_id'))->first() : null;
        return view('backend.modules.privilege.edit', compact('element', 'roles', 'role'));
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
        $element = Privilege::whereId($id)->with('roles')->first();
        if (request()->has('role_id')) {
            $currentRole = $element->roles->where('id', request('role_id'))->first();
            $element->roles()->updateExistingPivot($currentRole, [
                'index' => $request->index,
                'view' => $request->view,
                'create' => $request->create,
                'update' => $request->update,
                'delete' => $request->delete,
            ]);
        } else {
            $element->roles()->sync($request->roles);
            foreach ($request->roles as $roleId) {
                $currentRole = $element->roles->where('id', $roleId)->first();
                $element->roles()->updateExistingPivot($currentRole, [
                    'index' => true,
                    'view' => true,
                    'create' => true,
                    'update' => true,
                    'delete' => true,
                ]);
            }
        }
        $this->authorize('privilege.update', $element);
        $element->update($request->except('role_id', 'index', 'view', 'create', 'update', 'delete', 'roles'));
        return redirect()->route('backend.admin.privilege.index')->with('success', 'privilege updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Privilege::whereId($id)->first();
        $element->delete();
        return redirect()->route('backend.admin.privilege.index')->with('success', 'privilege deleted successfully');
    }
}
