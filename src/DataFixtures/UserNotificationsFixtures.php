<?php

namespace App\DataFixtures;

use App\Entity\UserNotifications;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UserNotificationsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userNotifications = new UserNotifications();
        $userNotifications->setSeen(true);

        $userNotifications->setUser($this->getReference('userNotifications'));

        $manager->persist($userNotifications);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [UserFixtures::class];
    }
}
