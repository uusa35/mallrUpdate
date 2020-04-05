<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Questionnaire;
use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Questionnaire::paginate(parent::TAKE);
        return view('backend.modules.questionnaire.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.questionnaire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $element = Questionnaire::create($request->all());
        if ($element) {
            return redirect()->route('backend.admin.questionnaire.index')->with('success', trans('general.questionnaire_added'));
        }
        return redirect()->back()->with('error', trans('general.questionnaire_not_added'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $element = Questionnaire::whereId($id)->first();
        $results = Result::where(['questionnaire_id' => $id])->with('question', 'answer')->get();
        return view(' backend.modules.questionnaire.show ', compact('element', 'results'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
