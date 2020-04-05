<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Questionnaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Question::paginate(parent::TAKE);
        return view('backend.modules.question.index', compact('elements'));
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
        $validate = validator($request->all(), [
            'name_ar' => 'required|max:200|unique:questions',
            'name_en' => 'required|max:200|unique:questions',
            'type' => 'required',
            'notes_ar' => 'nullable',
            'notes_en' => 'nullable',
            'is_multi' => 'boolean|nullable',
            'is_text' => 'boolean|nullable',
            'is_dropdown' => 'boolean|nullable',
            'active' => 'boolean|nullable',
            'order' => 'numeric|nullable',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $request->request->add([$request->type => true]);
        $element = Question::create($request->except('type'));
        if ($element) {
            return redirect()->back()->with('success', trans('general.question_added'));
        }
        return redirect()->back()->with('error', trans('general.question_not_added'));
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
        $element = Question::whereId($id)->first();
        $answers = Answer::active()->get();
        return view('backend.modules.question.edit', compact('element', 'answers'));
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
            'name_ar' => 'required|max:200|unique:questions,name_ar,' . $id,
            'name_en' => 'required|max:200|unique:questions,name_en,' . $id,
            'notes_ar' => 'nullable',
            'notes_en' => 'nullable',
            'is_multi' => 'boolean|nullable',
            'is_text' => 'boolean|nullable',
            'active' => 'boolean|nullable',
            'order' => 'numeric|nullable',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $element = Question::whereId($id)->with('answers')->first();
        if ($element) {
            $element->update($request->except('_token', '_method', 'answers'));
            if ($request->has('answers')) {
                $element->answers()->sync($request->answers);
            }
            return redirect()->route('backend.admin.question.index')->with('success', 'question created successfully');
        }
        return redirect()->back()->with('error', 'question is not created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Question::whereId($id)->with('surveys', 'answers', 'results')->first();
        if ($element) {
            if ($element->surveys->isNotEmpty()) {
                $element->surveys()->detach();
            }
            if ($element->results->isNotEmpty()) {
                foreach ($element->results as $r) {
                    $r->question()->dissociate();
                    $r->save();
                }
            }
            if ($element->answers->isNotEmpty()) {
                $element->answers()->detach();
            }
            $element->delete();
            return redirect()->route('backend.admin.question.index')->with('success', 'question deleted');
        }
        return redirect()->route('backend.admin.question.index')->with('error', 'question is not deleted');
    }

    public function updateAnswers(Request $request)
    {
        $element = Question::whereId($request->id)->first();
        $element->answers()->sync($request->answer_id);
    }
}
