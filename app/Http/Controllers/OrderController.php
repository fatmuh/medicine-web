<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data = Order::latest()->get();
        return view('pages.data.pesanan.index', [
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'obat_id' => 'required',
            'jumlah' => 'required',
            'waktu_ambil' => 'required',
        ]);

        $obat = Obat::findOrFail($validatedData['obat_id']);

        $user = auth()->user();

        $stok = $obat->stok;
        $jumlah = $validatedData['jumlah'];

        // Kondisi jika jumlah > stok atau stok bernilai 0 atau jumlah juga bernilai 0
        if ($jumlah > $stok || $stok == 0 || $jumlah == 0) {
            return redirect()->route('medicine.obat')->with('toast_error', 'Maaf, stok obat tidak mencukupi.');
        }

        $validatedData['user_id'] = $user->id;
        $validatedData['total_harga'] = $jumlah * $obat->harga;
        $validatedData['status'] = 'Pending';

        Order::create($validatedData);

        // Update stok obat
        $obat->update([
            'stok' => $stok - $jumlah,
        ]);

        return redirect()->route('medicine.order')->with('toast_success', 'Pesanan Berhasil Dibuat!');
    }

    public function update(Request $request, $id)
    {
        $item = Order::findOrFail($id);
        $data = $request->except(['_token']);
        $item->update($data);
        return redirect()->route('admin.pesanan.index')->with('toast_success', 'Status Pesanan Berhasil Diubah!');
    }

    public function delete($id)
    {
        $item = Order::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.pesanan.index')->with('toast_success', 'Pesanan Berhasil Dihapus!');
    }
}
