<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\ThanksMail;

class MailTestController extends Controller
{
    public function ThanksMail()
    {
        $name = 'test様';
        $text = 'これからもよろしくお願いいたします。';
        $to = 'living.tech.dancing.code@gmail.com';
        Mail::to($to)->send(new ThanksMail($name, $text));
    }
}

