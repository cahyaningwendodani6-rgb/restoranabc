<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function edit($slug)
    {
        $page = Page::where('slug', $slug)->firstOrCreate([
            'slug' => $slug,
        ]);

        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, $slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        $page->update([
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Halaman berhasil diperbarui!');
    }
}
