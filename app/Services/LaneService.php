<?php

namespace App\Services;

use App\Repositories\LaneRepository;

class LaneService
{
    private $repository;

    function __construct(LaneRepository $laneRepository)
    {
        $this->repository = $laneRepository;
    }

    /**
     * fetch all lanes data from LaneRepository
     *
     * @return object
     */

    public function getAll(): object
    {
        return $this->repository->getAll();
    }

    /**
     * fetch specified lane data from LaneRepository
     *
     * @param int $id
     * @return object
     */

    public function getById(int $id): object
    {
        return $this->repository->getById($id);
    }
}
