<?php

namespace App\Repository;

use App\Entity\User;

class UserRepository extends BaseRepository
{
    protected function getEntityName()
    {
        return User::class;
    }
}
