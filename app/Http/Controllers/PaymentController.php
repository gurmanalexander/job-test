<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentContract;

class PaymentController extends Controller
{
    public function index(PaymentContract $payment)
    {
        return $payment->make();
    }
}
