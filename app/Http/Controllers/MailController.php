<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class MailController extends Controller
{
    public function send_mail() {
        //send mail
        $to_name = "SMART-MOBILE";
        $to_email = "vib1910601@student.ctu.edu.vn";

        $data = array("name" => "Mail xác nhận", "body" => "noi dung body");
        Mail::send('pages.send_mail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email)->subject('test mail');
            $message->from($to_email, $to_name);
        });
        return Redirect::to('/trang-chu')->with('message', '');
    }
}