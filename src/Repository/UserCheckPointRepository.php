<?php

namespace App\Repository;

use App\Entity\UserCheckPoint;

class UserCheckPointRepository extends BaseRepository
{
    protected function getEntityName()
    {
        return UserCheckPoint::class;
    }
}
