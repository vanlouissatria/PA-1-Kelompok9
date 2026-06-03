<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminUserController extends Controller
{
    // Daftar semua admin (kecuali superadmin yang sedang login)
    public function index()
    {
        $admins = User::where('role', 'admin')
                      ->latest()
                      ->paginate(15);

        return view('admin.users.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:100'],
            'email'    => ['required', 'email:rfc', 'max:150', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
        ], [
            'name.required'      => 'Nama wajib diisi.',
            'name.max'           => 'Nama maksimal 100 karakter.',
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'email.max'          => 'Email maksimal 150 karakter.',
            'email.unique'       => 'Email sudah digunakan akun lain.',
            'password.required'  => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min'       => 'Password minimal 8 karakter, harus ada huruf besar, kecil, dan angka.',
        ]);

        User::create([
            'name'     => trim($request->name),
            'email'    => strtolower(trim($request->email)),
            'password' => Hash::make($request->password),
            'role'     => 'admin',
        ]);

        return redirect()->route('admin.users.index')
                         ->with('success', 'Akun admin "' . trim($request->name) . '" berhasil dibuat.');
    }

    public function edit(User $user)
    {
        // Superadmin tidak bisa diedit dari sini
        if ($user->role === 'superadmin') {
            abort(403);
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if ($user->role === 'superadmin') {
            abort(403);
        }

        $request->validate([
            'name'     => ['required', 'string', 'max:100'],
            'email'    => ['required', 'email:rfc', 'max:150', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed', Password::min(8)->mixedCase()->numbers()],
        ], [
            'name.required'      => 'Nama wajib diisi.',
            'name.max'           => 'Nama maksimal 100 karakter.',
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'email.max'          => 'Email maksimal 150 karakter.',
            'email.unique'       => 'Email sudah digunakan akun lain.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min'       => 'Password minimal 8 karakter, harus ada huruf besar, kecil, dan angka.',
        ]);

        $data = [
            'name'  => trim($request->name),
            'email' => strtolower(trim($request->email)),
        ];

        // Password hanya diupdate kalau diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
                         ->with('success', 'Akun admin "' . $user->name . '" berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        // Tidak bisa hapus superadmin dan tidak bisa hapus diri sendiri
        if ($user->role === 'superadmin') {
            abort(403);
        }

        if ($user->id === Auth::id()) {
            return redirect()->route('admin.users.index')
                             ->with('error', 'Tidak bisa menghapus akun sendiri.');
        }

        $name = $user->name;
        $user->delete();

        return redirect()->route('admin.users.index')
                         ->with('success', 'Akun admin "' . $name . '" berhasil dihapus.');
    }
}