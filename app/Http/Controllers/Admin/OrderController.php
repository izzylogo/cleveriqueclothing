<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with([
            'order_items.product.product_images',
            'user_address.user'
        ])->latest()->get();

        return Inertia::render('Admin/Order/OrderList', [
            'orders' => $orders
        ]);
    }
}
