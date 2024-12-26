<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
{
    $abouts = About::all(); // Ambil semua data dari tabel about
    //dd($abouts); // Memastikan data berhasil diambil
    return view('abouts', ['abouts' => $abouts]);
}

}
