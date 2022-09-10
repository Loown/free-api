<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\PaymentIntent as StripePaymentIntent;
use Stripe\Stripe;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        $booking = new Booking();

        $booking->start_at = $request->get('start_at');
        $booking->end_at = $request->get('start_at');
        $booking->status = 'booked';
        $booking->kilometers = $request->get('kilometers');
        // Create booking

        // $pi = StripePaymentIntent::create([
        //     'amount' => 1000,
        //     'currency' => 'eur',
        //     'customer' => Auth::user()->stripe_id,
        // ]);

        // If error with payment, set booking status to error
        // If payment OK, set status to booked
    }
}
