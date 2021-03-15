<?php

namespace App\DataFixtures;

use App\Entity\CheckPointType;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CheckPointTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $checkPointType = new CheckPointType();
        $checkPointType->setName('Start');
        $checkPointType->setAbsTime(DateTime::createFromFormat('H:i:s', "1:23:01"));
        $checkPointType->setRelTime(DateTime::createFromFormat('H:i:s', "2:23:01"));

        $manager->persist($checkPointType);

        $manager->flush();

        $this->addReference('checkPointType', $checkPointType);
    }
}
