<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Models\Reserve;
use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $amount = $request->session()->get('amount');
        return view('payment', ['amount' => $amount]);
    }

    public function payment(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $amount = $request->session()->get('amount');

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $amount,
                'currency' => 'jpy'
            ));

            $user_id = Auth::id();
            $reserve = $request->session()->get('reserve');
            $param = [
                'user_id' => $user_id,
                'store_id' => $reserve['store_id'],
                'num_of_people' => $reserve['num_of_people'],
                'start_at' => $reserve['date'] . " " . $reserve['start_at'],
                'course_amount' => $reserve['amount'],
            ];
            Reserve::create($param);

            return redirect()->route('payment.complete');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function complete()
    {
        return view('payment_complete');
    }
}
