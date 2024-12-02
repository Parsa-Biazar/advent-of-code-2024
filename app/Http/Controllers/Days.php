<?php

namespace App\Http\Controllers;

class Days extends Controller
{
    public $day;

    public function index()
    {
        $days = 25;
        return view('welcome', ['days' => $days]);
    }

    public function day($day)
    {
        $answer = 0;
        if ($day === 'day1') {
            $this->day = '1';
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

            $answer = [];
            for ($i = 0; $i < count($leftArray); $i++) {
                if ($leftArray[$i] > $rightArray[$i]) {
                    $answer[] += abs($rightArray[$i] - $leftArray[$i]);
                } elseif ($leftArray[$i] < $rightArray[$i]) {
                    $answer[] += abs($leftArray[$i] - $rightArray[$i]);
                }
            }

            $answer = array_sum($answer);
            $answers[] = $answer;
        }
        return view('Answers', ['answers' => $answers, 'day' => $day]);
    }

    public function solutions($day, $part)
    {
        if ($day === 'day1') {
            if ($part=== 'part1'){
                $code = "";
                return view('Solutions', ['codes' => 'code']);
            }
        }
    }
}
