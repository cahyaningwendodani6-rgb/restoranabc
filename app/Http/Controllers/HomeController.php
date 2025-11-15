<?php

namespace App\Http\Controllers;


use App\Models\Page;
use App\Models\Menu;

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
        $menu = Menu::all();
        $page = Page::where('slug', 'about')->first();

        return view('home', compact('menu', 'page'));
    }

    public function create()
    {
        $menu = Menu::all(); // ambil semua data menu dari database

        return view('pesanan', compact('menu'));
    }
}
