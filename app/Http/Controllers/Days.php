<?php

namespace App\Http\Controllers;

class Days extends Controller
{
    public function index()
    {
        $days = 25;
        return view('welcome', ['days' => $days]);
    }

    public function day($day)
    {
        $answer = 0;
        if ($day === 'day1') {
            $path = base_path('resources/data/day1.txt');
            $numbers = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $leftArray = [];
            $rightArray = [];
            for ($i = 0; $i < count($numbers); $i++) {

                $f = trim($numbers[$i]);
                $l = explode('   ', $f);
                $leftArray[] = $l[0];
                $rightArray[] = $l[1];
            }
            sort($leftArray);
            sort($rightArray);

                $answer=[];
            for ($i = 0; $i < count($leftArray); $i++) {
                if ($leftArray[$i] > $rightArray[$i]) {
                    $answer[] += abs($rightArray[$i] - $leftArray[$i]);
                } elseif ($leftArray[$i] < $rightArray[$i]) {
                    $answer[] += abs($leftArray[$i] - $rightArray[$i]);
                }
            }

            echo array_sum($answer);
        }
    }
}
