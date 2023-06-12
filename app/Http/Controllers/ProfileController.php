<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('user.profile', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('user.profile', compact('user'));

    }


    public function update(Request $request, $id)
    {
        // var_dump($request->all());
        // die();
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;

        if ($request->file('profile_image')) {
            $image_name = $request->file('profile_image')->store('image', 'public');
            $user->foto = $image_name;
        }

        $user->save();
        return view('user.profile', compact('user'));
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