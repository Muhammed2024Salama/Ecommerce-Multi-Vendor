<?php

namespace Ecommerce\Backend\Controllers\Admin\Category\Interface;

interface CategoryRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $id
     * @param $status
     * @return mixed
     */
    public function changeStatus($id, $status);
}
