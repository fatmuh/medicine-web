<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data = Contact::all();
        return view('pages.data.konsultasi.index', [
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'phone' => 'required',
        ]);

        Contact::create($validatedData);
        return redirect()->route('admin.konsultasi.index')->with('toast_success', 'Data Kontak Berhasil Ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $item = Contact::findOrFail($id);
        $data = $request->except(['_token']);
        $item->update($data);
        return redirect()->route('admin.konsultasi.index')->with('toast_success', 'Data Kontak Berhasil Diubah!');
    }

    public function delete($id)
    {
        $item = Contact::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.konsultasi.index')->with('toast_success', 'Data Kontak Berhasil Dihapus!');
    }
}
