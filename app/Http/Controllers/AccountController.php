<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    public function index()
    {
        // Cek apakah pengguna adalah admin
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $users = User::all();
        return view('admin.akun.index', compact('users'));
    }
}
