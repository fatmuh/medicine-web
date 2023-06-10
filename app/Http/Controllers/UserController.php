<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::latest()->get();
        return view('pages.data.user.index', [
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = User::findOrFail($id);
        $data = $request->except(['_token']);
        $item->update($data);
        return redirect()->route('admin.user.index')->with('toast_success', 'Data User Berhasil Diubah!');
    }

    public function delete($id)
    {
        $item = User::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.user.index')->with('toast_success', 'Data User Berhasil Dihapus!');
    }
}
