<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Illuminate\Support\Facades\Log;

class PayPalController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('services.paypal.client_id'),
                config('services.paypal.secret')
            )
        );

        $this->apiContext->setConfig([
            'mode' => config('services.paypal.mode'),
        ]);
    }

    public function createPayment()
    {
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $amount = new Amount();
        $amount->setTotal("10.00");  // Precio del producto
        $amount->setCurrency("USD");

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription("Compra en Mi Tienda");

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('paypal.success'))
                     ->setCancelUrl(route('paypal.cancel'));

        $payment = new Payment();
        $payment->setIntent("sale")
                ->setPayer($payer)
                ->setTransactions([$transaction])
                ->setRedirectUrls($redirectUrls);
        
        
        try {
            $response = $payment->create($this->apiContext);
            Log::info('PayPal API Response: ' . json_encode($response));
            return redirect()->away($payment->getApprovalLink());
        } catch (\Exception $ex) {
            Log::error('PayPal API Error: ' . $ex->getMessage());
            return back()->withError('Hubo un problema con PayPal: ' . $ex->getMessage());
        }
        
    }

    public function executePayment(Request $request)
    {
        if (!$request->has('paymentId') || !$request->has('PayerID')) {
            return redirect()->route('home')->with('error', 'Pago cancelado');
        }

        $paymentId = $request->input('paymentId');
        $payment = Payment::get($paymentId, $this->apiContext);
        
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));

        try {
            $payment->execute($execution, $this->apiContext);
            return redirect()->route('home')->with('success', 'Pago realizado con éxito');
        } catch (\Exception $ex) {
            return redirect()->route('home')->with('error', 'Error al procesar el pago');
        }
    }

    public function cancelPayment()
    {
        return redirect()->route('home')->with('error', 'Pago cancelado por el usuario.');
    }
}
