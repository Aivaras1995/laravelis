<?php

namespace App\Http\Controllers\Admin;

use App\Events\OrderCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrdersRequest;
use App\Models\Order;
use App\Models\Status;

class OrdersController extends Controller
{
    public function __construct ()
    {
        $this->authorizeResource(Order::class);
    }
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function store(OrdersRequest $request)
    {
        $order = Order::create(
            $request->all()
            + [
                'status_id' => Status::query()->where(['type' => 'order', 'name' => Status::STATE_NEW])->first()->id,
            ],
        );
        $this->dispatch(new OrderCreated($order));

        //pvz Perkelti uzsakyma i VMI sistema

        return redirect()->route('orders.show', $order);
    }

    public function create()
    {
        return view('orders.create');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(OrdersRequest $request, Order $order)
    {
        $order->update($request->all());
        return redirect()->route('orders.show', $order);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }
}
