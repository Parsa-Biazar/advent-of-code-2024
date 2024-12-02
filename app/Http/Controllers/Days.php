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
        //todo = part 1
        $answers = [];
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
            //todo = final part 1 answer
            $answers[] = array_sum($answer);
            //todo = part 2
            foreach ($leftArray as $o) {
                    $repeat = '';
                for ($i = 0; $i < count($rightArray); $i++) {
                    if ($o == $rightArray[$i]) {
                        $repeat++;
                    }
                }
                if ($repeat > 0) {
                    dump("Element $o, Repeat $repeat");
                }
            }
            //todo = final part 2 answer
            $answers[] = '';
        }

        return view('Answers', ['answers' => $answers, 'day' => $day]);
    }


    public function solutions($day, $part)
    {
        if ($day === 'day1') {
            if ($part === 'part1') {
                $code = "";
                return view('Solutions', ['codes' => 'code']);
            }
        }
    }
}
