<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Backend\ClassifiedStore;
use App\Http\Requests\Backend\ClassifiedUpdate;
use App\Http\Resources\ClassifiedCartResource;
use App\Http\Resources\ClassifiedExtraLightResource;
use App\Http\Resources\ClassifiedLightResource;
use App\Http\Resources\ClassifiedResource;
use App\Jobs\IncreaseElementViews;
use App\Models\Classified;
use App\Services\Search\Filters;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassifiedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->has('on_home') && request()->on_home) {
            $elements = Classified::active()->notExpired()->hasImage()->onHome()->available()->with('items.property', 'items.categoryGroup')->paginate(self::TAKE_MIN);
        } else {
            $elements = Classified::active()->notExpired()->hasImage()->available()->with('items.property', 'items.categoryGroup')->paginate(self::TAKE_MIN);
        }
        return response()->json(ClassifiedExtraLightResource::collection($elements), 200);
    }

    public function search(Filters $filters)
    {
        $validator = validator(request()->all(), ['search' => 'nullable']);
        if ($validator->fails()) {
            return redirect()->route('frontend.home')->withErrors($validator->messages());
        }
        $elements = Classified::filters($filters)->active()->hasImage()->notExpired()->with(['items.property', 'items.categoryGroup'])->orderBy('id', 'desc')->paginate(Self::TAKE_MIN);
        if (!$elements->isEmpty()) {
            return response()->json(ClassifiedExtraLightResource::collection($elements), 200);
        } else {
            return response()->json(['message' => trans('general.no_classifieds')], 400);
        }
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
        try {
            $validate = validator($request->all(), [
                'name_ar' => 'required|min:3|max:200',
                'name_ar' => 'required|min:3|max:200',
                'mobile' => 'required|min:5|max:20',
                'price' => 'required|string|min:2|max:10',
                'description_ar' => 'min:5|max:500',
                'description_en' => 'min:5|max:500',
                'image' => 'required|image',
                'images' => 'required|array|max:6',
                'country_id' => 'required|exists:countries,id',
                'category_id' => 'required|exists:categories,id',
                'user_id' => 'required|exists:users,id',
                'items' => 'array'
            ]);
            if ($validate->fails()) {
                return response()->json(['message' => $validate->errors()->first()], 400);
            }
            $element = Classified::create($request->except('images', 'image', 'api_token', 'items'));
            if ($element) {
                $element->update(['expired_at' => Carbon::now()->addWeeks(8), 'is_available' => true]);
                if ($request->has('items')) {
                    foreach ($request->items as $k => $v) {
                        $element->categoryGroups()->syncWithoutDetaching([$v['category_group_id'] => ['value' => $v['value'], 'property_id' => $v['property_id']]]);
                    }
                }
                $request->hasFile('image') ? $this->saveMimes($element, $request, ['image'], ['1080', '1440'], true) : null;
                $request->has('images') ? $this->saveGallery($element, $request, 'images', ['1080', '1440'], true) : null;
                return response()->json(ClassifiedLightResource::make($element), 200);
            }
            return response()->json(['message' => trans('message.failure')], 400);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $element = Classified::active()->whereId($id)->with(['images', 'user', 'items.property', 'items.categoryGroup', 'category', 'comments'])->first();
        if ($element) {
            IncreaseElementViews::dispatch($element);
            return response(new ClassifiedResource($element), 200);
        }
        return response()->json(['message' => trans('general.this_product_does_not_exist')], 400);
    }

    public function getClassifiedForCart(Request $request)
    {
        if ($request->has('cart_id')) {
            $element = Classified::whereId($request->product_id)->with(['product_attributes' => function ($q) {
                return $q->where('id', request()->product_attribute_id)->with('color', 'size');
            }])->with('user')->first();
        } else {
            $element = Classified::whereId($request->product_id)->with('color', 'size', 'user')->first();
        }
        return response()->json(new ClassifiedCartResource($element), 200);
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
        try {
            $element = Classified::active()->whereId($id)->with(['images', 'user', 'items.property', 'items.categoryGroup', 'category', 'comments'])->first();
            $validate = validator($request->all(), [
                'name_ar' => 'required|min:3|max:200',
                'name_ar' => 'required|min:3|max:200',
                'mobile' => 'required|min:5|max:20',
                'price' => 'required|numeric',
                'description_ar' => 'min:5|max:500',
                'description_en' => 'min:5|max:500',
                'image' => 'required|image',
                'images' => 'array|max:6',
                'country_id' => 'required|exists:countries,id',
                'category_id' => 'required|exists:categories,id',
                'user_id' => 'required|exists:users,id',
                'items' => 'array'
            ]);
            if ($validate->fails()) {
                return response()->json(['message' => $validate->errors()->first()], 400);
            }
            $updated = $element->update($request->except('images', 'image', 'api_token', 'items'));
            if ($updated) {
//                $element->update(['expired_at' => Carbon::now()->addWeeks(8), 'is_available' => true]);
                if ($request->has('items')) {
                    foreach ($request->items as $k => $v) {
                        $element->categoryGroups()->syncWithoutDetaching([$v['category_group_id'] => ['value' => $v['value'], 'property_id' => $v['property_id']]]);
                    }
                }
                $request->hasFile('image') ? $this->saveMimes($element, $request, ['image'], ['1080', '1440'], true) : null;
                $request->has('images') ? $element->images()->delete() : null;
                $request->has('images') ? $this->saveGallery($element, $request, 'images', ['1080', '1440'], true) : null;
                return response()->json(ClassifiedResource::make($element), 200);
            }
            return response()->json(['message' => trans('message.failure')], 400);
        } catch (\Exception $e) {
//            return response()->json(['message' => $e->getMessage()], 400);
            return response()->json(['message' => 'from catch case'], 400);
        }
        return response()->json(['message' => trans('message.failure')], 400);
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
