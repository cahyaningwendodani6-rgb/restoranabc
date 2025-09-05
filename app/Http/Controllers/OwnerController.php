<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.owner.index', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required |email|unique:users,email,'. Auth::user()->id,
            'password' => 'confirmed|min:8|nullable',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,|max:2048'
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = bcrypt($request->password);

        } 

        if ($request->hasFile('profile_photo')) {
            $fileName = time() . '.' . $request->profile_photo->Extension();
            $request->profile_photo->move(public_path('uploads/profile'), $fileName);
            
            $user->profile_photo = 'uploads/profile/' . $fileName;
        }

        $user->save();

        return redirect()->route('ubah-profil')->with('success', 'Profil Berhasil Diubah');
    }
}
