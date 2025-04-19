<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
    //   $data['name']=$request->name;
    //   $data['email']=$request->email;
    //   $data['subject']=$request->subject;
    //   $data['content']=$request->content;

    //   return view('admin.contact',$data);

      $data = [
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'content' => $request->content,
    ];


    // dd($request);
    Mail::to('nethmiwelgamvila@gmail.com')->send(new ContactMail($data));

    return 'Email sent!';
    }

    
}
