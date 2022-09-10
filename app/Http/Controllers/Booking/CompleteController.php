<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CompleteController extends Controller
{
    public function __invoke(Request $request, Booking $booking)
    {
        $stripe = new \Stripe\StripeClient('sk_test_51Lf69IFL5bQoYvhzxrwB6FtGGdHs9vsGe3MxV90ET2RPLXEuZLHxAcoRBUYP4EiZjfKQ9BJsP4FiBGDFcILKs6VS00NhgAWFaz');

        $pi = $stripe->paymentIntents->retrieve(
            $booking->payment_link,
            []
        );

        if ($pi->status === 'succeeded') {
            $booking->status = 'booked';
        }   else {
            $booking->status = 'error';
        }
        $booking->save();

        return Response::json($booking);
    }
}
