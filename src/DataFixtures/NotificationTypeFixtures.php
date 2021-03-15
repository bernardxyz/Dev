<?php

namespace App\DataFixtures;

use App\Entity\NotificationType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NotificationTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $notificationType = new NotificationType();
        $notificationType->setType('SMS');

        $manager->persist($notificationType);

        $manager->flush();

        $this->addReference('type', $notificationType);
    }
}
