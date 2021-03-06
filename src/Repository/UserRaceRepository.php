<?php

namespace App\Repository;

use App\Entity\UserRace;

class UserRaceRepository extends BaseRepository
{
    protected function getEntityName()
    {
        return UserRace::class;
    }
}
