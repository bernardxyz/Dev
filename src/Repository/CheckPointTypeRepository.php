<?php

namespace App\Repository;

use App\Entity\CheckPointType;
use App\Repository\Common\BaseRepository;

class CheckPointTypeRepository extends BaseRepository
{
    protected function getEntityName()
    {
        return CheckPointType::class;
    }

}
