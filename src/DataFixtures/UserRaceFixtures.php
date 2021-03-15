<?php

namespace App\DataFixtures;

use App\Entity\UserRace;
use App\Entity\UserRaceStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UserRaceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userRace = new UserRace();
        $userRace->setRegistrationDate(\DateTime::createFromFormat('Y-m-d', "2020-03-15"));

        $userRace->setUserRaceStatus($this->getReference('userRaceStatus'));
        $userRace->setUser($this->getReference('userStatus'));
        $userRace->setRace($this->getReference('raceStatus'));

        $manager->persist($userRace);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserRaceStatusFixtures::class, RaceFixtures::class];
    }
}
