<?php

namespace App\DataFixtures;

use App\Entity\UserRaceStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserRaceStatusFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $userRaceStatus = new UserRaceStatus();
        $userRaceStatus->setStatus('Active');

        $manager->persist($userRaceStatus);

        $manager->flush();

        $this->addReference('userRaceStatus', $userRaceStatus);
    }
}
