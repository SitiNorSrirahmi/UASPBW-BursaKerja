<?php

namespace App\Repositories;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * Mengambil semua kategori dengan pagination.
     *
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPaginatedCategories(int $perPage)
    {
        return Category::paginate($perPage);
    }

    /**
     * Membuat kategori baru.
     *
     * @param array $data
     * @return \App\Models\Category
     */
    public function createCategory(array $data)
    {
        return Category::create($data);
    }

    /**
     * Mengambil kategori berdasarkan ID.
     *
     * @param int $id
     * @return \App\Models\Category|null
     */
    public function findCategoryById($id)
    {
        return Category::find($id);
    }

    /**
     * Memperbarui kategori berdasarkan ID.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Category
     */
    public function updateCategory($id, array $data)
    {
        $category = $this->findCategoryById($id);

        if ($category) {
            $category->update($data);
        }

        return $category;
    }

    /**
     * Menghapus kategori berdasarkan ID.
     *
     * @param int $id
     * @return bool
     */
    public function deleteCategory($id)
    {
        $category = $this->findCategoryById($id);

        if ($category) {
            return $category->delete();
        }

        return false;
    }
}
