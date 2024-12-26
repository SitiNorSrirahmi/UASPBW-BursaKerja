<?php

namespace App\Repositories;

use App\Models\Application;
use App\Repositories\Contracts\ApplicationRepositoryInterface;

class ApplicationRepository implements ApplicationRepositoryInterface
{
    protected $model;

    public function __construct(Application $application)
    {
        $this->model = $application;
    }

    /**
     * Mengambil semua data lamaran.
     */
    public function getAllApplications()
    {
        return $this->model->with(['user', 'pekerjaan'])->get();
    }

    /**
     * Membuat lamaran baru.
     */
    public function createApplication(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Mencari lamaran berdasarkan ID.
     */
    public function findApplicationById($id)
    {
        return $this->model->with(['user', 'pekerjaan'])->findOrFail($id);
    }

    /**
     * Mengambil semua lamaran untuk lowongan tertentu.
     */
    public function getApplicationsByJob($jobId)
    {
        return $this->model->where('job_id', $jobId)->with(['user'])->get();
    }

    /**
     * Mengambil semua lamaran milik user tertentu.
     */
    public function getApplicationsByUser($userId)
    {
        return $this->model->where('user_id', $userId)->with(['pekerjaan'])->get();
    }
}
