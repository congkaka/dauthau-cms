<?php

namespace App\Http\Controllers\Api;

use App\Events\OrderSuccess;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function UpdateBooking(Request $request)
    {
        Booking::create([
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email ?? null,
            'training_id' => $request->course,
            'traffic' => $request->traffic ?? null,
            'position' => $request->position ?? null,
            'company' => $request->company ?? null,
            'experience' => $request->experience ?? null,
            'note' => $request->note ?? null,
        ]);

        OrderSuccess::dispatch($request->input());

        return Helper::response($request->input(), 200);
    }
}
