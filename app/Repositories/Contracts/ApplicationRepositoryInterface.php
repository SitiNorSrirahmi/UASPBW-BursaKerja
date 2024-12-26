<?php

namespace App\Repositories\Contracts;

interface ApplicationRepositoryInterface
{
    public function getAllApplications(); // Mengambil semua data lamaran
    public function createApplication(array $data); // Membuat lamaran baru
    public function findApplicationById($id); // Mencari lamaran berdasarkan ID
    public function getApplicationsByJob($jobId); // Mengambil semua lamaran untuk lowongan tertentu
    public function getApplicationsByUser($userId); // Mengambil semua lamaran milik user tertentu
}
