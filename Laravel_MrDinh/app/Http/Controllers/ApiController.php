<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getData()
    {
        // Gửi yêu cầu GET đến API COVID-19
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        // Lấy dữ liệu JSON từ API
        $data = $response->json();

        // Trả dữ liệu về view để hiển thị
        return view('FormApi', compact('data'));
    }
}
