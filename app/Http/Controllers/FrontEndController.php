<?php

namespace App\Http\Controllers;
use App\Events\DemoPusherEvent;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function getPusher(){
        // gọi ra trang view demo-pusher.blade.php
        return view("demo-pusher");
      }
      public function fireEvent(){
        // Truyền message lên server Pusher
        event(new DemoPusherEvent("Hi, I'm Trung Quân. Thanks for reading my article!"));
        return "Message has been sent.";
      }
  
}
