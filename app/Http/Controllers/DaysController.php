<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DaysController extends Controller
{
    public $day;

    public function index()
    {
        //todo = dynamic days !
        $days = DB::table('answer')->latest('id')->value('day');

        return view('welcome', ['days' => $days]);
    }

    public function details(int $day, int $part = 1)
    {
        $answer = DB::table('answer')
            ->where('part',$part)
            ->where('day',$day)
            ->get();
        return view('details', ['answer' => $this->callSolverService($day, $part),'info'=>$answer]);
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
}
