<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CollectionStore;
use App\Http\Requests\Backend\CollectionUpdate;
use App\Models\Collection;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', 'collection');
        if (auth()->user()->isAdminOrAbove) {
            $elements = Collection::with('products', 'user')->get();
        } else {
            $elements = Collection::active()->where(['user_id' => auth()->id()])->with('products', 'user')->get();
        }
        return view('backend.modules.collection.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('collection.create');
        $users = User::active()->get();
        $products = Product::active()->available()->hasImage()->serveCountries()->hasStock()->hasAtLeastOneCategory()->get();
        return view('backend.modules.collection.create', compact('products', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollectionStore $request)
    {
        $this->authorize('collection.create');
        $element = Collection::create($request->except('_token', 'image','products'));
        if ($element) {
            $request->hasFile('image') ? $this->saveMimes($element, $request, ['image'], ['1080', '1440'], true) : null;
            $element->products()->sync($request->products);
            return redirect()->route('backend.collection.index')->with('success', trans('message.collection_created_successfully'));
        }
        return redirect()->back()->with('error', trans('message.collection_failure'));
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
        $element = Collection::whereId($id)->with('products')->first();
        $this->authorize('collection.update', $element);
        $users = User::active()->get();
        $products = Product::active()->available()->hasImage()->serveCountries()->hasStock()->get();
        return view('backend.modules.collection.edit', compact('element','products','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CollectionUpdate $request, $id)
    {
        $element = Collection::whereId($id)->first();
        if ($element) {
            $this->authorize('collection.update', $element);
            $element->update($request->except('_token','products'));
            $request->hasFile('image') ? $this->saveMimes($element, $request, ['image'], ['1080', '1440'], true) : null;
            $element->products()->sync($request->products);
            return redirect()->route('backend.collection.index')->with('success', trans('message.collection_created_successfully'));
        }
        return redirect()->back()->with('error', trans('message.collection_failure'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Collection::whereId($id)->first();
        $element->products()->sync([]);
        if($element->delete()) {
            return redirect()->back()->with('success',trans('message.collection_deleted'));
        }
        return redirect()->back()->with('error',trans('message.collection_failure'));
    }
}
