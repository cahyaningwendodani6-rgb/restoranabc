<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::orderBy('id', 'desc')->get();

        return view('pages.menu.index', compact('menu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|regex:/^[\pL\s]+$/u',
            'kategori' => 'required',
            'harga' => 'required|numeric|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ],
        [
            'nama.required' => 'Nama menu harus diisi',
            'nama.regex' => 'Nama menu harus berupa huruf dan spasi',
            'kategori.required' => 'Kategori menu harus diisi',
            'harga.required' => 'Harga menu harus diisi',
            'harga.numeric' => 'Harga menu harus berupa angka',
            'harga.min' => 'Harga menu minimal adalah 0',
            'foto.image' => 'Foto menu harus berupa gambar',
            'foto.mimes' => 'Format foto menu harus jpg, jpeg, atau png',
            'foto.max' => 'Ukuran foto menu maksimal 2MB',
        ]);

        $data = $request->only(['nama', 'kategori', 'harga']);

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('menu', 'public');
        }

        Menu::create($data);

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $menu = Menu::findOrFail($id);

        return view('pages.menu.edit', compact('menu'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|regex:/^[\pL\s]+$/u',
            'kategori' => 'required',
            'harga' => 'required|numeric|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nama.required' => 'Nama menu harus diisi',
            'nama.regex' => 'Nama menu harus berupa huruf dan spasi',
            'kategori.required' => 'Kategori menu harus diisi',
            'harga.required' => 'Harga menu harus diisi',
            'harga.numeric' => 'Harga menu harus berupa angka',
            'harga.min' => 'Harga menu minimal adalah 0',
            'foto.image' => 'Foto menu harus berupa gambar',
            'foto.mimes' => 'Format foto menu harus jpg, jpeg, atau png',
            'foto.max' => 'Ukuran foto menu maksimal 2MB',
        ]);

        $menu = Menu::findOrFail($id);

        $data = $request->only(['nama', 'kategori', 'harga']);

        // Jika ada foto baru
        if ($request->hasFile('foto')) {

            // Hapus foto lama jika ada
            if ($menu->foto && Storage::disk('public')->exists($menu->foto)) {
                Storage::disk('public')->delete($menu->foto);
            }

            // Upload foto baru
            $data['foto'] = $request->file('foto')->store('menu', 'public');
        }

        $menu->update($data);

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil diubah');
    }

    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);

        // Hapus foto di storage
        if ($menu->foto && Storage::disk('public')->exists($menu->foto)) {
            Storage::disk('public')->delete($menu->foto);
        }

        $menu->delete();

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil dihapus');
    }
}
