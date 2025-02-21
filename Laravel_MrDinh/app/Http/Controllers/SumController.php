<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SumController extends Controller
{
    public function sumAB( Request $request) {
        $sum1 = $request -> input("inputA");
        $sum2 = $request -> input("inputB");
        $sum = $sum1 + $sum2;
        return view("welcome", ['sum'=>$sum]);
    }
}