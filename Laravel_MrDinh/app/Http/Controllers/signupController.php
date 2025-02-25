<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SignupRequest;

class SignupController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu từ session (nếu có)
        $userSession = session('userSession', []);
        return view('signup')->with('userSession', $userSession);
    }

    public function displayInfor(SignupRequest $request)
    {
        // Lấy dữ liệu hiện có từ session (nếu có)
        $userSession = session('userSession', []);

        // Tạo dữ liệu mới từ form
        $user = [
            'name' => $request->input("name"),
            'age' => $request->input("age"),
            'date' => $request->input("date"),
            'phone' => $request->input("phone"),
            'web' => $request->input("web"),
            'address' => $request->input("address"),
        ];

        // Thêm người dùng mới vào session
        $userSession[] = $user;
        session(['userSession' => $userSession]);

        // Trả về view kèm session
        return view('signup')->with('userSession', $userSession);
    }

    public function clearSession()
    {
        // Xóa toàn bộ dữ liệu trong session
        Session::forget('userSession');
        return redirect()->route('signup'); // Điều hướng về form đăng ký
    }
}