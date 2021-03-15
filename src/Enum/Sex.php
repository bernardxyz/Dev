<?php

namespace App\Enum;

use App\Enum\Common\BaseSequentialEnum;

class Sex extends BaseSequentialEnum
{
    CONST MALE   = 'Male';
    CONST FEMALE = 'Female';

    CONST MALE_ID   = 1;
    CONST FEMALE_ID = 2;

    CONST COLLECTION = [
        self::MALE_ID   => self::MALE,
        self::FEMALE_ID => self::FEMALE,
    ];

    protected static $supported = self::COLLECTION;
}