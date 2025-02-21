<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\signupRequest;

class signupController extends Controller
{
    public function index()
    {
        return view('signup'); // Gọi giao diện form đăng ký
    }

    public function displayInfor(signupRequest $request)
    {
        $user = [
            'name' => $request->input("name"),
            'age' => $request->input("age"),
            'date' => $request->input("date"),
            'phone' => $request->input("phone"),
            'web' => $request->input("web"),
            'address' => $request->input("address"),
        ];

        return view('signup')->with('user', $user);
    }
}