<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Backend\PropertyStore;
use App\Http\Requests\Backend\PropertyUpdate;
use App\Models\Area;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Classified;
use App\Models\Property;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PropertyController extends Controller
{
    public function getAttach(Request $request)
    {
        $validate = validator($request->all(), [
            'id' => 'required|exists:classifieds,id',
        ]);
        if ($validate->fails()) {
            redirect()->back()->withErrors($validate->errors());
        }
        $element = Classified::whereId($request->id)->first();
        $elements = $element->category->categoryGroups()->with('properties')->get();
        return view('backend.modules.classified.attach', compact('elements', 'element'));
    }

    public function postAttach(Request $request)
    {
        $validate = validator($request->all(), [
            'id' => 'required|exists:classifieds,id',
            'properties' => 'required|array',
        ]);
        if ($validate->fails()) {
            redirect()->back()->withErrors($validate->errors());
        }
        $element = Classified::whereId($request->id)->first();
        foreach ($request->properties as $k => $v) {
            $element->properties()->sync(['property_id' => $k, 'value' => $v]);
        }
        return redirect()->route('backend.classified.index')->with('success', 'classified properties saved successfully');
    }

    public function detach(Request $request)
    {
        $validate = validator($request->all(), [
            'id' => 'required|exists:classifieds,id',
        ]);
        if ($validate->fails()) {
            redirect()->back()->withErrors($validate->errors());
        }
        $element = Classified::whereId($request->id)->first();
        $element->properties()->sync([]);
        return redirect()->route('backend.classified.index')->with('success', 'classified properties detached');
    }

}
