<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Http\Requests\PaymentRequest;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = Payment::all();
        return view('payment.index', compact('payment'));
    }

    public function store(PaymentRequest $request)
    {
        $payment = Payment::create($request->all());
        return redirect()->route('payment.show', $payment);
    }

    public function create()
    {
        return view('payment.create');
    }

    public function show(Payment $payment)
    {
        return view('payment.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        return view('payment.edit', compact('payment'));
    }

    public function update(PaymentRequest $request, Payment $payment)
    {
        $payment->update($request->all());
        return redirect()->route('paymentTypes.show', $payment);
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payment.index');
    }

}
