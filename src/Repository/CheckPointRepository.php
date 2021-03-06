<?php

namespace App\Repository;

use App\Entity\CheckPoint;
use App\Repository\BaseRepository;

class CheckPointRepository extends BaseRepository
{
    protected function getEntityName()
    {
        return CheckPoint::class;
    }

}
