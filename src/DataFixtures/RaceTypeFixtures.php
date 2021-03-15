<?php

namespace App\DataFixtures;

use App\Entity\RaceType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RaceTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $raceType = new RaceType();
        $raceType->setName('Half Marathon');
        $manager->persist($raceType);

        $manager->flush();

        $this->addReference('raceType', $raceType);
    }
}
