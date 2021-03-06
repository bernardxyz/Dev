<?php

namespace App\Repository;

use App\Entity\UserNotifications;

class UserNotificationsRepository extends BaseRepository
{
    protected function getEntityName()
    {
        return UserNotifications::class;
    }
}
