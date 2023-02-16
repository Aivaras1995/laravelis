<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $latestOrders = Orders::latest()->take(5)->get();
        $latestProducts = Products::latest()->take(5)->get();
        $latestUsers = User::latest()->take(5)->get();

        return view('admin.dashboard', compact('latestOrders', 'latestProducts', 'latestUsers'));
    }
}

