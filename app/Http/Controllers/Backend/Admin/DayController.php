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
}
