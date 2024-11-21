<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function UpdateBooking(Request $request){
        Booking::create([
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email??null,
            'training_id' => $request->course,
            'traffic' => $request->traffic??null,
            'position' => $request->position??null,
            'company' => $request->company??null,
            'experience' => $request->experience??null,
            'note' => $request->note??null,
        ]);

        return Helper::response($request->input(), 200);
    }
}
