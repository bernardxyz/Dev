<?php

namespace App\Repository;

use App\Entity\UserType;

class UserTypeRepository extends BaseRepository
{
    protected function getEntityName()
    {
        return UserType::class;
    }
}
