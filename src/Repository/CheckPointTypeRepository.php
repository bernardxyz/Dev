<?php

namespace App\Repository;

use App\Entity\CheckPointType;

class CheckPointTypeRepository extends BaseRepository
{
    protected function getEntityName()
    {
        return CheckPointType::class;
    }

}
