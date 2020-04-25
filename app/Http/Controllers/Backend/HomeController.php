<?php

namespace App\Http\Controllers\Backend;

use App\Core\PrimaryController;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Order;
use App\Models\Product;
use App\Services\Traits\NotificationHelper;
use App\Src\Currency\Currency;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use \Illuminate\Support\Str;

class HomeController extends Controller
{
    use NotificationHelper;
    public function index()
    {
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now();
        $orders = Order::query();
        $monthlyReports = $orders->where('paid', true)
            ->whereDate('created_at', '<=', $end)
            ->whereDate('created_at', '>=', $start)
            ->with(['order_metas' => function ($q) {
            return $q->where('item_type', 'product');
        }])->get();
        return view('backend.home', compact('monthlyReports'));
    }

    public function home()
    {
        return view('backend.home');
    }

    public function changeLanguage()
    {
        app()->setLocale(request('locale'));
        session()->put('locale', request('locale'));
        return redirect()->back();
    }
    public function toggleActivate(Request $request)
    {
        $className = 'App\Models\\' . ($request->has('strictMode') && $request->strictMode ? $request->model : Str::title($request->model));
        $element = new $className();
        $element = $element->withoutGlobalScopes()->whereId($request->id)->first();
        $element->update([
            'active' => !$element->active
        ]);
        return redirect()->back()->with('success', 'Process Success');
    }

    public function toggleFeatured(Request $request)
    {
        $className = '\App\Models\\' . Str::title($request->model);
        $element = new $className();
        $element = $element->withoutGlobalScopes()->whereId($request->id)->first();
        if (isset($element->featured)) {
            $element->update([
                'featured' => !$element->featured
            ]);
            return redirect()->back()->with('success', 'Process Success');
        }
        return redirect()->back()->with('error', 'Process Failure .. no such thing');
    }

    public function toggleOnHome(Request $request)
    {
        $className = '\App\Models\\' . Str::title($request->model);
        $element = new $className();
        $element = $element->withoutGlobalScopes()->whereId($request->id)->first();
        if (isset($element->on_home)) {
            $element->update([
                'on_home' => !$element->on_home
            ]);
            return redirect()->back()->with('success', 'Process Success');
        }
        return redirect()->back()->with('error', 'Process Failure .. no such thing');
    }

    public function toggleOnSale(Request $request)
    {
        $className = '\App\Models\\' . Str::title($request->model);
        $element = new $className();
        $element = $element->withoutGlobalScopes()->whereId($request->id)->first();
        if (isset($element->on_sale)) {
            $element->update([
                'on_sale' => !$element->on_sale
            ]);
            return redirect()->back()->with('success', 'Process Success');
        }
        return redirect()->back()->with('error', 'Process Failure .. no such thing');
    }

    public function BackupDB()
    {
        Artisan::call('backup:db');
        return back()->with('success', 'db packed successfully');
    }

    public function exportTranslations()
    {
        Artisan::call('publish-trans');
        return redirect()->back()->with('success', 'translations exported');
    }

    public function createNotification($element)
    {
        $element = Product::active()->hasAttributes()->first();
        $this->notify(
            trans(
                'message.notification_message',
                [
                    'type' => 'testing',
                    'name' => $element->name,
                    'project_name' => $element->name
                ]
            ),
            '',
            [
                'path' => asset('storage/uploads/files/' . $element->path),
                'title' => $element->name,
                'type' => 'pdf'
            ]
        );
    }
}
