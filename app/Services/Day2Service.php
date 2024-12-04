<?php

namespace App\Services;

use App\Trait\AdventOfCodeSolver;

class Day2Service
{
    use AdventOfCodeSolver;

    public static function getList()
    {
        $path = base_path('resources/data/day2.txt');
        //TODO use Laravel syntax
        return file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }

    public static function part1()
    {
        $list = collect(self::getList())->all();
        $listLength = sizeof($list);
        $validRowCount = 0;
        for ($i = 0; $i < $listLength; $i++) {
            $rowIsValid = true;
            $direction = 'none'; //(1 = asc , -1 = desc)
            $numbers = explode(' ', $list[$i]);
            $numbersCount = sizeof($numbers);
            for ($j = 0; $j < $numbersCount; $j++) {
                if ($j == $numbersCount - 1) {
                    continue;
                }

                $diff = $numbers[$j + 1] - $numbers[$j];
                $currentDirection = ($diff > 0) ? 'asc' : 'desc';
                if ($j == 0)
                    $direction = $currentDirection;

                if ($diff == 0 || abs($diff) > 3 || $currentDirection != $direction) {
                    $rowIsValid = false;
                    break;
                }
            }

            if ($rowIsValid) {
                $validRowCount++;
            }
        }

        return $validRowCount;
    }

    public static function part2()
    {
        $list = collect(self::getList())->all();
        $listLength = sizeof($list);
        dd($list);
    }
}
