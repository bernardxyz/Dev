<?php

namespace App\Repository;

use App\Entity\Race;

class RaceRepository extends BaseRepository
{
    protected function getEntityName()
    {
        return Race::class;
    }
}
