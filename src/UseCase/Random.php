<?php

namespace App\UseCase;

use App\Repository\TestRepository;

class Random
{
    private $repo;

    public function __construct(TestRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getData()
    {
        return [
            'data' => $this->repo->getRandomEntity()
        ];
    }
}