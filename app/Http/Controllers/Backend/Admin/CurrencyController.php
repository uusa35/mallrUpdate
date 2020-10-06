<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Requests\Backend\CurrencyStore;
use App\Models\Country;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index','currency');
        $elements = Currency::with('country')->get();
        return view('backend.modules.currency.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('currency.' . __FUNCTION__);
        $allCountries = Country::active()->whereDoesntHave('currency')->get();
        return view('backend.modules.currency.create', compact('allCountries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyStore $request)
    {
        $element = Currency::create($request->all());
        if ($element) {
            return redirect()->route('backend.admin.currency.index')->with('success', 'currency saved');
        }
        return redirect()->route('backend.admin.currency.index')->with('error', 'currency not saved');
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
        $element = Currency::whereId($id)->first();
        $this->authorize('currency.update', $element);
        $allCountries = Country::active()->get();
        $this->authorize('currency.update', $element);
        return view('backend.modules.currency.edit', compact('element', 'allCountries'));
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
            'name_ar' => 'required|unique:currencies,name_ar,' . $id,
            'name_en' => 'required|unique:currencies,name_en,' . $id,
            'currency_symbol_ar' => 'required|unique:currencies,currency_symbol_ar,' . $id,
            'currency_symbol_en' => 'required|unique:currencies,currency_symbol_en,' . $id,
            'exchange_rate' => 'required|numeric',
            'country_id' => 'required|exists:countries,id|unique:currencies,country_id,' . $id,
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }

        $element = Currency::whereId($id)->first();
        $this->authorize('currency.update', $element);
        $updated = $element->update($request->all());
        if ($updated) {
            return redirect()->route('backend.admin.currency.index')->with('success', 'currency updated successfully');
        }
        return redirect()->route('backend.admin.currency.index')->with('error', 'currency did not update!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Currency::whereId($id)->first();
        $this->authorize('currency.delete', $element);
        if ($element->delete()) {
            return redirect()->route('backend.admin.currency.index')->with('success', 'currency deleted successfully');
        }
        return redirect()->route('backend.admin.currency.index')->with('error', 'currency did not delete!!');
    }

    public function updateRates()
    {
        Artisan::call('currency:update');

        return redirect()->route('backend.admin.currency.index')->with('success', 'currencies updated');
    }
}
