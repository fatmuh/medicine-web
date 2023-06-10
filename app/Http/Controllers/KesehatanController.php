<?php

namespace App\Http\Controllers;

use App\Models\Kesehatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KesehatanController extends Controller
{
    public function index()
    {
        $data = Kesehatan::latest()->get();
        return view('pages.data.kesehatan.index', [
            'data' => $data,
        ]);
    }

    public function kesehatanCreate()
    {
        return view('pages.data.kesehatan.add');
    }

    public function kesehatanPost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'thumbnail' => 'image|file|max:2048',
        ]);

        if($request->file('thumbnail')) {
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('thumbnail');
        }

        $slug = Str::slug($validatedData['title']);
        $validatedData['slug'] = $slug;

        Kesehatan::create($validatedData);
        return redirect()->route('admin.kesehatan.index')->with('toast_success', 'Artikel Berhasil Ditambah!');
    }

    public function kesehatanEdit($slug)
    {
        $data = Kesehatan::where('slug', $slug)->first();
        return view('pages.data.kesehatan.edit', [
            'data' => $data,
        ]);
    }

    public function update(Request $request, $slug)
    {
        $item = Kesehatan::where('slug', $slug)->first();
        $data = $request->except(['_token']);

        if($request->file('thumbnail')) {
            if($request->oldthumbnail){
                Storage::delete($request->oldThumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnail');
        }

        $slug = Str::slug($data['title']);
        $data['slug'] = $slug;

        $item->update($data);
        return redirect()->route('admin.kesehatan.index')->with('toast_success', 'Artikel Berhasil Diubah!');
    }

    public function delete($id)
    {
        $item = Kesehatan::findOrFail($id);
        if($item->thumbnail){
            Storage::delete($item->thumbnail);
        }
        $item->delete();
        return redirect()->route('admin.kesehatan.index')->with('toast_success', 'Artikel Berhasil Dihapus!');
    }
}
