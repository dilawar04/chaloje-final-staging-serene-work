<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        /*Here I need the Plot Data*/

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'gbp',
                    'product_data' => [
                        'name' => 'Broadway City Plot',
                        'description' => 'You have to pay £250 for booking the plot',
                    ],
                    'unit_amount' => 25000,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => url('thanks-booking'),
            'cancel_url' => url('payment/failed'),
        ]);

        header("Location: " . $session->url);

        echo "<pre>", print_r($session, 1), "</pre>";
        die('CALL');



        return response()->withHeader('Location', $session->url)->withStatus(303);

        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
                //'price' => 'price_1KLR2AGHsPs5NDWLSUiwdVI5',
                'price' => 'price_1KLQX6KiCtRWJHV0cAB71Apd',
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => url("cart/success"),
            'cancel_url' => url("cart/cancel"),
        ]);

        return $checkout_session->url;
        // Enter Your Stripe Secret
        /*\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $amount = 250;
        $amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
            'amount' => $amount,
            'currency' => 'gbp',
            'payment_method_types' => ['card'],
            'description' => 'Broadway Plot Booking',
        ]);

        $intent = $payment_intent->client_secret;

        return view('themes.broadway.checkout.credit-card',compact('intent'));*/

    }

    public function afterPayment()
    {
        set_notification('Thanks for Booking!', 'success');
        return \redirect()->to('thanks-booking');
    }

    public function form(){
        $intent = '';
        return view('themes.broadway.checkout.checkout_form', compact('intent'));
    }
}
