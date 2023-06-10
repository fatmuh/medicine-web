<?php

namespace App\Http\Controllers;

use App\Models\Obat;
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
    public function index()
    {
        $data = Obat::all();
        return view('pages.dashboard.index', [
            'data' => $data,
        ]);
    }

    public function obat()
    {
        $data = Obat::all();
        return view('pages.obat.index', [
            'data' => $data,
        ]);
    }
}
