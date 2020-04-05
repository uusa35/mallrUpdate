<?php

namespace App\Http\Controllers\Frontend;

use App\Jobs\IncreaseElementViews;
use App\Models\Product;
use App\Models\User;
use App\Services\Search\Filters;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $validate = validator(request()->all(), [
            'type' => 'required|min:3'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->with('errors', 'Please Specify a role');
        }
        $elements = User::whereHas('role', function ($q) {
            return $q->where(request()->type, true);
        })->paginate(self::TAKE_MIN);
        return view('frontend.wokiee.four.modules.user.index', compact('elements'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Filters $filters)
    {
        $element = User::whereId($id)->with([
            'collections.products.product_attributes',
            'collections.products.product_attributes',
            'collections.products.user',
            'collections.products.brand',
            'collections.products.categories.children',
            'collections.products.colors',
            'collections.products.sizes',
            'images', 'fans'
        ])->first();
        IncreaseElementViews::dispatch($element);
        if (!request()->hasAny(['product_category_id', 'size_id', 'color_id'])) {
            $services = $element->services()->filters($filters)->with(
                'user', 'tags', 'categories.children', 'images'
            )->paginate(Self::TAKE);
        }
        if ($element->isDesigner) {
            $productIds = $element->collections()->with('products')->get()->pluck('products')->flatten()->unique('id')->pluck('id')->toArray();
            $products = Product::whereIn('id', $productIds)->filters($filters)->with([
                'product_attributes.color', 'color',
                'colors', 'sizes', 'size', 'user',
                'product_attributes.size', 'images',
                'tags', 'categories.children', 'brand',
            ])->paginate(Self::TAKE_MIN);
        } else {
            $products = $element->products()->filters($filters)->with([
                'product_attributes.color', 'color',
                'colors', 'sizes', 'size', 'user',
                'product_attributes.size', 'images',
                'tags', 'categories.children', 'brand'
            ])->paginate(Self::TAKE_MIN);
        }
        $tags = isset($services) ? $services->pluck('tags')->flatten()->unique('id')->sortKeysDesc() : $products->pluck('tags')->flatten()->unique('id')->sortKeysDesc();
        $sizes = $products->pluck('product_attributes')->flatten()->pluck('size')->flatten()->unique('id')->sortKeysDesc();
        $colors = $products->pluck('product_attributes')->flatten()->pluck('color')->flatten()->unique('id')->sortKeysDesc();
        $brands = $products->pluck('brands')->flatten()->flatten()->unique('id')->sortKeysDesc();
        $categoriesList = isset($services) ? $services->pluck('categories')->flatten()->unique('id') : $products->pluck('categories')->flatten()->unique('id');
        $vendors = isset($services) ? $services->pluck('user')->flatten()->unique('id') : null;
        $companies = $products->pluck('user')->flatten()->unique('id');
        if($element->isDesigner) {
            $collections = $element->collections->paginate(10);
        }
        return view('frontend.wokiee.four.modules.user.show', compact(
            'element', 'products','collections',
            'services', 'tags', 'sizes', 'colors', 'brands', 'categoriesList',
            'vendors', 'companies'
        ));
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
