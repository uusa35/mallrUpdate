<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Traits\DashboardTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use \Illuminate\Support\Str;

class HomeController extends Controller
{
    use DashboardTrait;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.home');
    }
}
