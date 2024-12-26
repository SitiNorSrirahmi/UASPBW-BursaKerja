<?php

namespace App\Repositories;

use App\Repositories\Contracts\PekerjaanRepositoryInterface;
use App\Models\pekerjaan;

class PekerjaanController extends Controller
{
    protected $pekerjaanRepository;

    public function __construct(PekerjaanRepositoryInterface $pekerjaanRepository)
    {
        $this->pekerjaanRepository = $pekerjaanRepository;
    }

    public function index()
    {
        $pekerjaans = $this->pekerjaanRepository->getAllpekerjaans();
        return view('pekerjaan.index', compact('pekerjaans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $this->pekerjaanRepository->createpekerjaan($validated);
        return redirect('/pekerjaan')->with('success', 'Pekerjaan berhasil ditambahkan');
    }
}
