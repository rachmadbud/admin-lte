<?php

namespace App\Http\Controllers;

use App\Worker;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        return view('dashboard');
    }

    public function karyawan()
    {
        $datas = Worker::all();
        return view('index', compact('data'));
    }
}
