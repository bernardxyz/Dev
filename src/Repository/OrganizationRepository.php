<?php

namespace App\Repository;

use App\Entity\Organization;


class OrganizationRepository extends BaseRepository
{
    protected function getEntityName()
    {
        return Organization::class;
    }
}
