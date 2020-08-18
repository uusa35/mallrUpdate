<?php

namespace App\Http\Controllers\Backend;

use App\Core\PrimaryController;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Order;
use App\Models\Product;
use App\Services\Traits\DashboardTrait;
use App\Services\Traits\NotificationHelper;
use App\Src\Currency\Currency;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use \Illuminate\Support\Str;

class HomeController extends Controller
{
    use NotificationHelper, DashboardTrait;
    public function index()
    {
        $orders = Order::query();
        $monthlyReports = $orders->where('paid', true)
            ->whereDate('created_at', '<=', Carbon::now())
            ->whereDate('created_at', '>=', Carbon::now()->startOfMonth())
            ->with(['order_metas' => function ($q) {
            return $q->where('item_type', 'product')->with('product');
        }])->get();
        $productsCount = $monthlyReports->pluck('order_metas')->flatten()->count();
        return view('backend.home', compact('monthlyReports','productsCount'));
    }

    public function home()
    {
        return view('backend.home');
    }
}
