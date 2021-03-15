<?php

namespace App\DataFixtures;

use App\Entity\UserType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $userType = new UserType();
        $userType->setName('Brojač');

        $manager->persist($userType);

        $manager->flush();

        $this->addReference('userType', $userType);
    }
}
