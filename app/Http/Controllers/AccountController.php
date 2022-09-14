<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public  function profile()
    {
        return view('account.profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|alpha_dash|string|max:255|unique:users,username,' . auth()->id() . ',id',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id() . ',id',
        ]);

        $user = User::findOrFail(auth()->id());
        $user->update([
            'name' => $request->name,
            'username' => strtolower($request->username),
            'email' => strtolower($request->email),
        ]);

        return redirect()->back()->with('success', __('Profil berhasil diperbaharui.'));
    }

    public  function password()
    {
        return view('account.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password_now' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::findOrFail(auth()->id());

        if (!Hash::check($request->password_now, $user->password)) {
            return back()->withErrors([
                'password_now' => __('Password yang Anda masukan salah'),
            ])->withInput();
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', __('Password berhasil diperbaharui.'));
    }
}
