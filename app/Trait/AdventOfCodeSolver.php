<?php

namespace App\Trait;

trait AdventOfCodeSolver
{
    public static function solve($part = 1)
    {
        return self::solvePartIfExists($part);
    }

    private static function solvePartIfExists($part)
    {
        $methodName = "part{$part}";
        if (!method_exists(self::class, "part{$part}")) {
            abort(404);
        }
        return self::$methodName();
    }
}
