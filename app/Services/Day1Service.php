<?php

namespace App\Services;

use App\Trait\AdventOfCodeSolver;

class Day1Service
{
    use AdventOfCodeSolver;

    public static function part1()
    {
        list($leftArray, $rightArray) = self::makeSortedLeftRightArrays();

        $answer = 0;
        for ($i = 0; $i < count($leftArray); $i++) {
            $answer += abs($rightArray[$i] - $leftArray[$i]);
        }

        //TODO save answer for each part in sqlite db
        return $answer;
    }

    private static function makeSortedLeftRightArrays()
    {
        $path = base_path('resources/data/day1.txt');
        //TODO use Laravel syntax
        $numbers = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $leftArray = [];
        $rightArray = [];
        for ($i = 0; $i < count($numbers); $i++) {
            //FIXME fix names...!!!
            $f = trim($numbers[$i]);
            $l = explode('   ', $f);
            $leftArray[] = $l[0];
            $rightArray[] = $l[1];
        }

        //TODO Laravel
        sort($leftArray);
        sort($rightArray);

        return [$leftArray, $rightArray];
    }

    public static function part2()
    {
        list($leftArray, $rightArray) = self::makeSortedLeftRightArrays();

        $sum = 0;
        $leftArraySize = sizeof($leftArray);
        $rightArraySize = sizeof($rightArray);

        for ($i = 0; $i < $leftArraySize; $i++) {
            //TODO
            for ($j = 0; $j < $rightArraySize; $j++) {
                if ($leftArray[$i] < $rightArray[$j]) {
                    break;
                }
                if ($leftArray[$i] == $rightArray[$j]) {
                    $sum += $leftArray[$i];
                }
            }
        }

        return $sum;
    }
}
