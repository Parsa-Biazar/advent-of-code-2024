<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Days extends Controller
{
    public function index()
    {
        $days = 25 ;
        return view('welcome',['days' => $days]);
    }

    public function day($day)
    {
        dd($day);
    }
}
