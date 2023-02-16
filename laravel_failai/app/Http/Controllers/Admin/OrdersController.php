<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrdersRequest;
use App\Models\Orders;
use App\Models\Status;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::all();
        return view('orders.index', compact('orders'));
    }

    public function store(OrdersRequest $request)
    {
        $order = Orders::create(
            $request->all()
            + [
                'status_id' => Status::query()->where(['type' => 'order', 'name' => 'Naujas'])->first()->id,
            ],
        );
        return redirect()->route('orders.show', $order);
    }

    public function create()
    {
        return view('orders.create');
    }

    public function show(Orders $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Orders $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(OrdersRequest $request, Orders $order)
    {
        $order->update($request->all());
        return redirect()->route('orders.show', $order);
    }

    public function destroy(Orders $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }
}
