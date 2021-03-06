<?php

namespace App\Repository;

use App\Entity\UserRaceStatus;

class UserRaceStatusRepository extends BaseRepository
{
    protected function getEntityName()
    {
        return UserRaceStatus::class;
    }
}
