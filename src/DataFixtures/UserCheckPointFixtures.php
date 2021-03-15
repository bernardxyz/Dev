<?php

namespace App\DataFixtures;

use App\Entity\UserCheckPoint;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UserCheckPointFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userCheckPoint = new UserCheckPoint();
        $userCheckPoint->setTime(DateTime::createFromFormat('H:i:s', "00:20:23"));

        $userCheckPoint->setUser($this->getReference('userCheckPoint'));
        $userCheckPoint->setCheckPoint($this->getReference('CheckPoint'));

        $manager->persist($userCheckPoint);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [UserFixtures::class, CheckPointFixtures::class];
    }
}
