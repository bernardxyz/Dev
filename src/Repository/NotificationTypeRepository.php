<?php

namespace App\Repository;

use App\Entity\NotificationType;

class NotificationTypeRepository extends BaseRepository
{
    protected function getEntityName()
    {
        return NotificationType::class;
    }
}
