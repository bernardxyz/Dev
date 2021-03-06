<?php

namespace App\Repository;

use App\Entity\RaceType;

class RaceTypeRepository extends BaseRepository
{
    protected function getEntityName()
    {
        return RaceType::class;
    }
}
