<?php

namespace App\Repository;

use App\Entity\Notifications;

class NotificationsRepository extends BaseRepository
{
    protected function getEntityName()
    {
        return Notifications::class;
    }
}
