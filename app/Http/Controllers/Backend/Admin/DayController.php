<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Day;

class DayController extends Controller
{
    public function index()
    {
        $elements = Day::all();
        return view('backend.modules.day.index', compact('elements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = Day::whereId($id)->first();
        return view('backend.modules.day.edit', compact('element'));
    }

}
