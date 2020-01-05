<?php 

namespace App\OrderDetails;

use App\Billing\PaymentGatewayContract;

class OrderDetails{

    private $paymentGateway;

    public function __construct(PaymentGatewayContract $paymentGateway)
    {
        $this->BankPaymentGateway = $paymentGateway;
    }

    public function all()
    {
        $this->BankPaymentGateway->setDiscount('500');

        return [
            'name'=>'victor',
            'address'=>'something'
        ];
    }
}