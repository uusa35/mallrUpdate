<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Survey::orderBy('id', 'desc')->paginate(self::TAKE);
        return view('backend.modules.survey.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::with('answers')->get();
        return view('backend.modules.survey.create', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = validator($request->all(), [
            'name' => 'required|max:200|unique:surveys',
            'price' => 'required|numeric|min:0.5|max:999',
            'slug_ar' => 'required|max:200|unique:surveys',
            'slug_en' => 'required|max:200|unique:surveys',
            'description_ar' => 'nullable|max:300',
            'description_en' => 'nullable|max:300',
            'is_home' => 'boolean|nullable',
            'is_desktop' => 'boolean|nullable',
            'is_footer' => 'boolean|nullable',
            'active' => 'boolean|nullable',
            'order' => 'numeric|nullable',
            'questions' => 'required|array'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $element = Survey::create($request->except('questions'));
        if ($element) {
            $element->questions()->attach($request->questions);
            return redirect()->route('backend.admin.survey.index')->with('success', trans('general.survey_added'));
        }
        return redirect()->back()->with('error', trans('general.survey_not_added'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $element = Survey::whereId($id)->first();
        return view('backend.modules.survey.show', compact('element'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = Survey::whereId($id)->with('questions')->first();
        $questions = Question::with('answers')->get();
        return view('backend.modules.survey.edit', compact('questions', 'element'));
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
        $validate = validator($request->all(), [
            'name' => 'required|max:200|unique:surveys,name,' . $id,
            'price' => 'required|numeric|min:0.5|max:999',
            'slug_ar' => 'required|max:200|unique:surveys,slug_ar,' . $id,
            'slug_en' => 'required|max:200|unique:surveys,slug_en,' . $id,
            'description_ar' => 'nullable|max:300',
            'description_en' => 'nullable|max:300',
            'is_home' => 'boolean|nullable',
            'is_desktop' => 'boolean|nullable',
            'is_footer' => 'boolean|nullable',
            'active' => 'boolean|nullable',
            'order' => 'numeric|nullable',
            'questions' => 'required|array'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $element = Survey::whereId($id)->first();
        $element->update($request->except('questions'));
        if ($element) {
            $element->questions()->sync($request->questions);
            return redirect()->route('backend.admin.survey.index')->with('success', 'survey created successfully');
        }
        return redirect()->back()->with('error', 'survey is not created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Survey::whereId($id)->with('questions.answers')->first();
        if ($element) {
            $element->questions()->detach();
            $element->delete();
            return redirect()->route('backend.survey.index')->with('success', 'survey deleted');
        }
        return redirect()->route('backend.survey.index')->with('error', 'survey is not deleted');
    }
}
