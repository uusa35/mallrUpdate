<?php

namespace App\Http\Controllers\Backend\Admin;

use File;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->has('question_id')) {
            $elements = Question::whereId(request()->question_id)->first()->answers()->paginate(parent::TAKE);
        } else {
            $elements = Answer::orderby('id', 'desc')->paginate(parent::TAKE);
        }
        return view('backend.modules.answer.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $json = File::get(base_path("icons.json"));
        $icons = collect(json_decode($json))['icons'];
        return view('backend.modules.answer.create', compact('icons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = validator($request->all(), [
            'name_ar' => 'required|max:200|unique:answers',
            'name_en' => 'required|max:200|unique:answers',
            'value' => 'boolean|nullable',
            'is_multi' => 'boolean|nullable',
            'icon' => 'alpha|nullable',
            'order' => 'numeric|nullable',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $question = Question::whereId($request->question_id)->first();
        if ($question) {
            $element = $question->answers()->create($request->except('question_id'));
            if ($element) {
                if ($request->has('questions')) {
                    $element->questions()->sync($request->questions);
                }
                return redirect()->back()->with('success', trans('general.answer_added'));
            }
        }
        return redirect()->back()->with('error', trans('general.answer_not_added'));
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
        $element = Answer::whereId($id)->with('questions.answers')->first();
        $questions = Question::active()->get();
        return view('backend.modules.answer.edit', compact('element', 'questions'));
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
        $validate = validator($request->all(), [
            'name_ar' => 'required|max:200|unique:answers,name_ar,' . $id,
            'name_en' => 'required|max:200|unique:answers,name_en,' . $id,
            'value' => 'boolean|nullable',
            'is_multi' => 'boolean|nullable',
            'icon' => 'alpha|nullable',
            'order' => 'numeric|nullable',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $element = Answer::whereId($id)->with('questions')->first();
        if ($element) {
            $element->update($request->except('questions', '_token', '_method'));
            if ($request->has('questions')) {
                $element->questions()->sync($request->questions);
            }
            return redirect()->route('backend.admin.answer.index')->with('success', 'answered created successfully');
        }
        return redirect()->route('backend.admin.answer.index')->with('error', 'answered is not created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Answer::whereId($id)->with('questions')->first();
        if ($element) {
            $element->questions()->detach();
            $element->delete();
            return redirect()->route('backend.admin.answer.index')->with('success', 'answer deleted');
        }
        return redirect()->route('backend.admin.answer.index')->with('error', 'answer is not deleted');
    }
}
