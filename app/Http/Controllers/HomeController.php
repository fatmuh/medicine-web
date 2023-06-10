<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Order;
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
    public function index(Request $request)
    {
        $search = $request->input('search');
        $data = Obat::where('nama', 'LIKE', '%' . $search . '%')->get();
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

    public function pesanan()
    {
        $user_id = auth()->user()->id;
        $data = Order::latest()->where('user_id', $user_id)->get();
        return view('pages.pesanan.index', [
            'data' => $data,
        ]);
    }

    public function invoice($id)
    {
        $data = Order::findOrFail($id);
        return view('pages.pesanan.invoice', [
            'data' => $data,
        ]);
    }
}
