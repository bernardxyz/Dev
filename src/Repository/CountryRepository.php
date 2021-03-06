<?php

namespace App\Repository;

use App\Entity\Country;

class CountryRepository extends BaseRepository
{
    protected function getEntityName()
    {
        return Country::class;
    }
}
