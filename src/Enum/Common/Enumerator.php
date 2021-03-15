<?php

namespace App\Enum\Common;

interface Enumerator
{
    public static function create($value);

    public function __toString();

    public function toString();
}
