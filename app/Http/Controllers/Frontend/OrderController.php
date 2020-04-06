<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Jobs\CheckCartItems;
use App\Models\Country;
use App\Models\Order;
use App\Services\CartTrait;
use App\Services\Traits\OrderTrait;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;

class OrderController extends Controller
{
    use OrderTrait, CartTrait;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Order::where(['user_id' => auth()->user()->id, 'status' => 'success'])->with('order_metas.product', 'order_metas.service')->paginate(self::TAKE);
//        $ids = $orders->pluck('order_metas')->flatten()->unique()->pluck('product.id')->toArray();
//        $elements = Product::whereIn('id', $ids)->paginate(12);
        return view('frontend.wokiee.four.modules.order.index', compact('elements', 'orders'));
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


    public function store(Request $request)
    {
        $validate = validator($request->all(), [
            'country_id' => 'required|exists:countries,id',
        ]);
        if($validate->fails()) {
            return redirect()->back()->with('error', trans('general.country_is_required'));
        }
        $country = Country::whereId($request->country_id)->first();
        CheckCartItems::dispatchNow($country);
        $this->addCountryToCart($country, $this->cart);
        $user = $this->createUser($request);
        if ($user && $country) {
            $order = $this->createWebOrder($request, $user);
            if ($order) {
                auth()->login($user);
                $elements = $this->cart->content();
                return view('frontend.wokiee.four.modules.cart.show', compact('elements', 'order'))->with('success', trans('message.register_account_password_is_your_mobile'));
            }
        } else {
            return 'here error case';
            return redirect()->route('frontend.cart.index')->with('error', trans('please_check_your_information_again'));
        }
        return redirect()->route('frontend.cart.index')->with('error', trans('please_check_your_information_again'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::whereId($id)->with('order_metas.product', 'order_metas.product_attribute.color', 'order_metas.product_attribute.size')->first();
        $coupon = session('coupon') ? session('coupon') : null;
        return view('frontend.modules.order.show', compact('order', 'coupon'));
    }

    public function viewInvoice($id)
    {
        $order = Order::whereId($id)->with('order_metas.product', 'order_metas.product_attribute.color', 'order_metas.product_attribute.size', 'services')->first();
        $markdown = new Markdown(view(), config('mail.markdown'));
        return $markdown->render('emails.order-complete', ['order' => $order, 'user' => $order->user]);
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