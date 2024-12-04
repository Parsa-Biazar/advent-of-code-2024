<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DaysController extends Controller
{
    public $day;

    public function index()
    {
        $days = DB::table('answer')->latest('id')->value('day');

        return view('welcome', ['days' => $days]);
    }

    public function details(int $day, int $part = 1)
    {
        if (!DB::table('answer')->where('day', $day)->where('part', $part)->exists()) {
            $answer = [
                'part' => $part,
                'day' => $day,
                'answer' => $this->getServiceClassName($day)::getAnswer($part),
                'solution' => $this->getServiceClassName($day)::getSolution($part),
                'question' => 'not available at the moment',
            ];
            DB::table('answer')->insert($answer);
        }
        $answer = DB::table('answer')->where('day', $day)->where('part', $part)->get();
        return view('details', ['info' => $answer]);
    }

    private function callSolverService(int $day, int $part)
    {
        $className = "App\\Services\\Day{$day}Service";
        if (class_exists($className)) {
            return $className::solve($part);
        } else {
            abort(404);
        }
    }

    private function getServiceClassName(int $day)
    {
        $className = "App\\Services\\Day{$day}Service";
        if (class_exists($className)) {
            return $className;
        } else {
            abort(404);
        }
    }
}
