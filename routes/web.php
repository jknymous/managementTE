<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// Route untuk login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'username' => ['required'],
        'password' => ['required'],
    ]);

    $user = User::where('username', $credentials['username'])->first();

    if (!$user) {
        // User tidak ditemukan
        return redirect()->back()
            ->withErrors(['username' => 'Usernam salah atau lakukan pendaftaran terlebih dahulu'])
            ->withInput($request->only('username'));
    }

    if (!Hash::check($credentials['password'], $user->password)) {
        // Password salah
        return redirect()->back()
            ->withErrors(['password' => 'Password salah'])
            ->withInput($request->only('username'));
    }

    // Login berhasil
    session([
        'user_id' => $user->id,
        'role' => $user->role,
        'username' => $user->username,
    ]);

    return redirect('/dashboard')->with('status', 'Login berhasil!');
})->name('login.submit');


// Route untuk dashboard
Route::get('/dashboard', function () {
    if (!session('user_id')) {
        return redirect('/login');
    }
    return view('dashboard'); // Mengembalikan view dashboard
})->name('dashboard');

// Route untuk logout
Route::post('/logout', function () {
    session()->flush(); // Menghapus semua session
    return redirect('/login'); // Redirect ke halaman login
})->name('logout');
