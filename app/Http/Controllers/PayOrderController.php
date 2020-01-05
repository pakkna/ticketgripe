<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGatewayContract;
use App\OrderDetails\OrderDetails;

class PayOrderController extends Controller
{
    public function store(OrderDetails $orderDetails, PaymentGatewayContract $paymentGateway){

        // $paymentGateway = new BankPaymentGateway('usd');
        $order = $orderDetails->all();
        dd($paymentGateway->charge(1100));
    }
}
