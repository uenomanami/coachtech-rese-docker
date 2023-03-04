<?php

namespace App\Http\Controllers;

use App\Mail\FromAdministorMail;
use App\Http\Requests\MailRequest;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class MailSendController extends Controller
{
    public function index()
    {
        $users = User::all();

        $param = [
            'users' => $users
        ];
        return view('from_admin_mail_create', $param);
    }

    public function send(MailRequest $request)
    {
        $user = User::find($request->user);
        $title = $request->title;
        $content = $request->content;
        Mail::send(new FromAdministorMail($user, $title, $content));

        return view('maildone');
    }
}
