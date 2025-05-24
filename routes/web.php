<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// Route untuk login
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'username' => ['required'],
        'password' => ['required'],
    ]);

    $user = User::where('username', $credentials['username'])->first();

    if (!$user) {
        return redirect()->back()
            ->withErrors(['username' => 'Username salah atau lakukan pendaftaran terlebih dahulu'])
            ->withInput($request->only('username'));
    }

    if (!Hash::check($credentials['password'], $user->password)) {
        return redirect()->back()
            ->withErrors(['password' => 'Password salah'])
            ->withInput($request->only('username'));
    }

    // Cek masa aktif akun
    if ($user->active_until < now()) {
        return redirect()->back()->withErrors(['username' => 'Masa aktif akun anda telah habis']);
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

// Route untuk menyimpan user
Route::post('/user/store', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username',
        'password' => 'required|string|confirmed|min:6',
    ]);
    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()->all(),
        ], 422);
    }
    User::create([
        'name' => $request->name,
        'username' => $request->username,
        'password' => bcrypt($request->password),
        'role' => 'user',
        'active_until' => now()->addDays(30),
    ]);
    return response()->json([
        'success' => true,
        'message' => 'User berhasil dibuat',
    ]);
})->name('user.store');

// Route untuk logout
Route::post('/logout', function () {
    session()->flush(); // Menghapus semua session
    return redirect('/login'); // Redirect ke halaman login
})->name('logout');
