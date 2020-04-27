<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Requests\SettingUpdate;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index','setting');
        $element = Setting::first();
        return view('backend.modules.setting.index', compact('element'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $this->authorize('index','setting');
        $element = Setting::with('images')->first();
        return view('backend.modules.setting.edit', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingUpdate $request, $id)
    {
        $setting = Setting::first();
        if ($setting->update($request->request->all())) {
            $request->hasFile('logo') ? $this->saveMimes($setting, $request, ['logo'], ['1024', '1024'], true) : null;
            $request->hasFile('app_logo') ? $this->saveMimes($setting, $request, ['app_logo'], ['600', '221'], true) : null;
            $request->hasFile('menu_bg') ? $this->saveMimes($setting, $request, ['menu_bg'], ['1242', '2688'], true) : null;
            $request->hasFile('main_bg') ? $this->saveMimes($setting, $request, ['main_bg'], ['1242', '2688'], true) : null;
            $request->hasFile('size_chart') ? $this->saveMimes($setting, $request, ['size_chart'], ['1080', '1440'], true) : null;
            $request->hasFile('gift_image') ? $this->saveMimes($setting, $request, ['gift_image'], ['750', '750'], true) : null;
            $request->has('images') ? $this->saveGallery($setting, $request, 'images', ['1080', '1440'], true) : null;
            return redirect()->route('backend.admin.setting.index')->with('success', 'setting updated');
        }
        return redirect()->route('backend.admin.setting.index')->with('error', 'setting error');
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
