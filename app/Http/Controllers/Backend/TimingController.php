<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\TimingStore;
use App\Models\Day;
use App\Models\Service;
use App\Models\Timing;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', 'timing');
        if (auth()->user()->isAdminOrABove && !request()->has('service_id')) {
            $elements = Timing::has('service', '>', 0)->with('service.user')->get();
        } else {
            $elements = request()->has('service_id') ?
                Timing::active()->where(['service_id' => request('service_id')])->with('service.user')->get() : Timing::where(['user_id' => auth()->id()])->with('service.user')->get();
        }
        return view('backend.modules.timing.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('timing.create');
        $services = auth()->user()->isAdminOrAbove ? Service::active()->get() : auth()->user()->services()->get();
        $users = User::active()->get();
        $days = Day::all();
        return view('backend.modules.timing.create', compact('services', 'users', 'days'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimingStore $request)
    {
        $days = $request->day_id == '10' ? Day::all() : Day::whereId($request->day_id)->first();
        if ($days->count() > 1) {
            foreach ($days as $day) {
                $request->request->add(['day_id' => $day->id, 'day_no' => $day->day_no, 'day_name_en' => $day->day_name_en, 'day_name_ar' => $day->day_name_ar, 'day' => $day->day]);
                $timing = Timing::create($request->request->all());
            }
        } else {
            $request->request->add(['day_no' => $days->day_no, 'day_name_en' => $days->day_name_en, 'day_name_ar' => $days->day_name_ar, 'day' => $days->day]);
            $timing = Timing::create($request->request->all());
        }
        if ($timing) {
            return redirect()->back()->with('success', trans('message.success'));
        }
        return redirect()->back()->with('error', trans('message.failure'));
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
        $element = Timing::whereId($id)->first();
        $this->authorize('timing.update', $element);
        $services = auth()->user()->isAdminOrAbove ? Service::active()->get() : auth()->user()->services()->get();
        $users = User::active()->get();
        $days = Day::all();
        return view('backend.modules.timing.edit', compact('element', 'services', 'users', 'days'));
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
        $day = Day::whereId($request->day_id)->first();
        $request->request->add(['day_no' => $day->day_no, 'day_name_en' => $day->day_name_en, 'day_name_ar' => $day->day_name_ar, 'day' => $day->day]);
        $element = Timing::whereId($id)->first();
        $updated = $element->update($request->except('_token', '_method'));
        if ($updated) {
            return redirect()->route('backend.timing.index', ['service_id' => $element->service_id])->with('success', trans('message.success'));
        }
        return redirect()->back()->with('error', trans('message.failure'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Timing::whereId($id)->first();
        if ($element->delete()) {
            return redirect()->route('backend.timing.index')->with('success', trans('message.success'));
        }
        return redirect()->back()->with('error', trans('message.failure'));
    }
}
