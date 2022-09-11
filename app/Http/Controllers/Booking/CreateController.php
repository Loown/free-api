<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\PaymentIntent as StripePaymentIntent;
use Stripe\Stripe;
use Illuminate\Support\Facades\Response;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        $stripe = new \Stripe\StripeClient('sk_test_51Lf69IFL5bQoYvhzxrwB6FtGGdHs9vsGe3MxV90ET2RPLXEuZLHxAcoRBUYP4EiZjfKQ9BJsP4FiBGDFcILKs6VS00NhgAWFaz');

        $booking = new Booking();
        $start_at = new Carbon(request()->get('start_at'));
        $end_at = new Carbon(request()->get('end_at'));
        $booking->start_at = $start_at;
        $booking->end_at = $end_at;
        $booking->status = 'processing';
        $booking->kilometers = $request->get('kilometers');
        $booking->user()->associate(Auth::user());
        $booking->vehicle()->associate(Vehicle::where('id', request()->get('vehicle'))->first());
        $paymentIntent = $stripe->paymentIntents->create([
            'amount' => 2000,
            'currency' => 'eur',
            'payment_method_types' => ['card'],
        ]);
        $booking->payment_link = $paymentIntent->id;
        $booking->save();

        return Response::json([
            'booking' => $booking,
            'payment_intent' => $paymentIntent,
        ]);
    }
}
