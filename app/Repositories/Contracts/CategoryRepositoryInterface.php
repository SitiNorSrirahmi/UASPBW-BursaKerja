<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    /**
     * Mengambil semua kategori untuk ditampilkan di tabel.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPaginatedCategories(int $perPage);

    /**
     * Membuat kategori baru.
     *
     * @param array $data
     * @return \App\Models\Category
     */
    public function createCategory(array $data);

    /**
     * Mengambil kategori berdasarkan ID.
     *
     * @param int $id
     * @return \App\Models\Category|null
     */
    public function findCategoryById($id);

    /**
     * Memperbarui kategori berdasarkan ID.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Category
     */
    public function updateCategory($id, array $data);

    /**
     * Menghapus kategori berdasarkan ID.
     *
     * @param int $id
     * @return bool
     */
    public function deleteCategory($id);
}
