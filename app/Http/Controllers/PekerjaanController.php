<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pekerjaan;

class PekerjaanController extends Controller
{
    public function index()
    {
        $pekerjaans = Pekerjaan::all();
        dd ($pekerjaans);
        return view('pekerjaans.index', compact('pekerjaans'));
    }


    // public function create()
    // {
    //     return view('pekerjaans.create');
    // }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'title' => 'required',
    //         'description' => 'required',
    //         'category_id' => 'required|exists:categories,id',
    //     ]);

    //     Pekerjaan::create($validated);
    //     return redirect('/pekerjaans')->with('success', 'Lowongan berhasil ditambahkan');
    // }
}


