<?php

namespace Ecommerce\Backend\Controllers\Admin\Category\Repository;

use Ecommerce\Backend\Controllers\Admin\Category\Interface\CategoryRepositoryInterface;
use Ecommerce\Backend\Controllers\Admin\Category\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Category::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return Category::create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        $category = $this->findById($id);
        return $category->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $category = $this->findById($id);
        return $category->delete();
    }

    /**
     * @param $id
     * @param $status
     * @return mixed
     */
    public function changeStatus($id, $status)
    {
        $category = $this->findById($id);
        $category->status = $status == 'true' ? 1 : 0;
        return $category->save();
    }
}
