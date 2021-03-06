<?php

namespace App\Repository;

use App\Entity\City;

class CityRepository extends BaseRepository
{
    protected function getEntityName()
    {
        return City::class;
    }
}
