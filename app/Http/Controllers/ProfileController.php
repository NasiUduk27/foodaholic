<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {

        $user = auth()->user();
        return view('user.profile', compact('user'));
    }


    public function update(Request $request)
    {

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('profile_images', $image, $filename);

            $user = auth()->user();
            $user->profile_image = $filename;
            $user->save();
        }
    }

    public function insert(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('profile_images', $image, $filename);

            $user = auth()->user();
            $user->profile_image = $filename;
            $user->save();

            return redirect()->route('profil')->with('success', 'Gambar profil berhasil diunggah.');
        }

        return redirect()->back()->with('error', 'Terjadi kesalahan saat mengunggah gambar profil.');
    }

}