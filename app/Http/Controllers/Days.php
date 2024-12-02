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
        if ($day === 'day1') {
            $path = base_path('resources/data/day1.txt');
            $numbers = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);


        }
    }
}
