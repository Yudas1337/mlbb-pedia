<?php

namespace App\Repositories;

use App\Models\Lane;

class LaneRepository
{
    private $model;

    function __construct(Lane $lane)
    {
        $this->model = $lane;
    }

    /**
     * fetch all lanes data from Lane Models
     *
     * @return object
     */

    public function getAll(): object
    {
        return $this->model->all();
    }

    /**
     * fetch specified lane data from Lane Models by given id
     *
     * @param int $id
     * @return object
     */

    public function getById(int $id): object
    {
        return $this->model->findOrFail($id);
    }
}
