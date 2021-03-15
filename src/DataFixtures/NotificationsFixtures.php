<?php

namespace App\DataFixtures;

use App\Entity\Notifications;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class NotificationsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $notifications = new Notifications();
        $notifications->setTime(DateTime::createFromFormat('H:i:s', "22:23:01"));
        $notifications->setCreatetAt(DateTime::createFromFormat('H:i:s', "14:23:01"));
        $notifications->setText('Hello');

        $notifications->setUser($this->getReference('Notifications'));
        $notifications->setOrganization($this->getReference('orgNotifications'));
        $notifications->setNotificationType($this->getReference('type'));

        $manager->persist($notifications);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [OrganizationFixtures::class];
    }
}
