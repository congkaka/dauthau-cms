<?php

namespace App\Listeners;

use App\Events\OrderSuccess;
use App\Mail\SendMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class OrderSuccessNotification
{
    /**
     * Create the event listener.
     */

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderSuccess $event): void
    {
        $details = $event->details;
        $courses = \App\Models\Training::where('id', $details['course'])->first();
        Mail::to($details['email'] ?? 'trinhvancong1996@gmail.com')->send(new SendMail(
            [
                'subject' => 'CÔNG TY CỔ PHẦN ĐẦU TƯ VÀ PHÁT TRIỂN TRÍ LỰC VIỆT Thông Báo: Đăng ký thành công',
                'title' => 'Bạn đã đăng ký thành công khóa học với thông tin',
                'fullname' => $details['fullname'],
                'gender' => $details['gender'],
                'phone' => $details['phone'],
                'email' => $details['email'] ?? '',
                'courses' => $courses->name,
                'traffic' => $details['traffic'] ?? '',
                'position' => $details['position'] ?? '',
                'company' => $details['company'] ?? '',
                'experience' => $details['experience'] ?? '',
                'note' => $details['note'] ?? '',
            ]
        ));
    }
}
