<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menus = Menu::all();
        $page = Page::where('slug', 'about')->first();

        // pisahkan kategori
        $makanan = $menus->where('kategori', 'Makanan');
        $minuman = $menus->where('kategori', 'Minuman');
        $camilan = $menus->where('kategori', 'Camilan');

        return view('home', compact('makanan', 'minuman', 'camilan', 'page'));
    }

    public function create()
    {
        $menu = Menu::all(); // ambil semua data menu dari database

        return view('pesanan', compact('menu'));
    }

    public function menu()
    {
        $menus = Menu::with('kategori')->get();

        $makanan = $menus->where('kategori', 'Makanan');
        $minuman = $menus->where('kategori', 'Minuman');
        $camilan = $menus->where('kategori', 'Camilan');

        return view('pelanggan.menu', compact('makanan', 'minuman', 'camilan'));
    }
}
