<?php

namespace App\DataFixtures;

use App\Entity\CheckPoint;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CheckPointFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $checkPoint = new CheckPoint();
        $checkPoint->setNumber(25);
        $checkPoint->setCheckPointType($this->getReference('checkPointType'));
        $checkPoint->setRace($this->getReference('raceCheckPoint'));

        $manager->persist($checkPoint);
        $manager->flush();

        $this->addReference('CheckPoint', $checkPoint);
    }

    public function getDependencies(): array
    {
        return [CheckPointTypeFixtures::class, RaceFixtures::class];
    }
}
