<?php

namespace App\Repositories\Contracts;

interface PekerjaanRepositoryInterface
{
    public function getAllpekerjaans();

    public function createpekerjaan(array $data);

    public function findpekerjaanById($id);
}