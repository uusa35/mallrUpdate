<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    public function index()
    {
        $products = User::whereId(auth()->user()->id)->first()->product_favorites()->with('images', 'favorites')->paginate(self::TAKE);
        $services = User::whereId(auth()->user()->id)->first()->service_favorites()->with('images', 'favorites')->paginate(self::TAKE);
        return view('frontend.wokiee.four.modules.favorite.index', compact('products', 'services'));
    }

    public function addProduct($id)
    {
        Product::whereId($id)->first()->favorites()->sync(auth()->user()->id);
        return redirect()->back()->with('success', trans('message.favorite_saved'));
    }

    public function addService($id)
    {
        Service::whereId($id)->first()->favorites()->sync(auth()->user()->id);
        return redirect()->back()->with('success', trans('message.favorite_saved'));
    }

    public function removeProduct($id)
    {
        $element = Favorite::where(['product_id' => $id, 'user_id' => auth()->user()->id])->first()->delete();
        if ($element) {
            return redirect()->back()->with('success', trans('general.favorite_deleted'));
        }
        return redirect()->back()->with('error', trans('general.favorite_not_deleted'));
    }

    public function removeService($id)
    {
        $element = Favorite::where(['service_id' => $id, 'user_id' => auth()->user()->id])->first()->delete();
        if ($element) {
            return redirect()->back()->with('success', trans('general.favorite_deleted'));
        }
        return redirect()->back()->with('error', trans('general.favorite_not_deleted'));
    }

}
