<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\LeaveRequestStatus;

class MailController extends Controller
{
    public function sendMail()
    {
        $payroll = [
            'name' => 'S M Ahaduzzaman',
            'body' => 'You are receiving this email because we received a payroll request for your account. If you did not request a payroll, no further action is required. No one can access your account without your email and password. If you have any questions or concerns, please contact us at 10 am to 6 pm.',
            'thanks' => 'Thank you for using our application!',
        ];

        Mail::to('smahaduzzaman96@gmail.com')->send(new LeaveRequestStatus($payroll));

        // return 'Mail sent successfully';
        dd('Mail sent successfully');
    }
}
