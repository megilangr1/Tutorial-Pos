<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function main()
    {
        $data = [];
        return view('backend.main', compact('data'));
    }
}
