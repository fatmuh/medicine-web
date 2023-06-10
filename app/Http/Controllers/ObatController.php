<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $data = Obat::latest()->get();
        return view('pages.data.obat.index', [
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required',
            'satuan' => 'required',
            'harga' => 'required|integer',
            'status' => 'required',
            'stok' => 'required|integer',
        ]);

        Obat::create($validatedData);
        return redirect()->route('admin.obat.index')->with('toast_success', 'Data Obat Berhasil Ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $item = Obat::findOrFail($id);
        $data = $request->except(['_token']);
        $item->update($data);
        return redirect()->route('admin.obat.index')->with('toast_success', 'Data Obat Berhasil Diubah!');
    }

    public function delete($id)
    {
        $item = Obat::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.obat.index')->with('toast_success', 'Data Obat Berhasil Dihapus!');
    }
}
