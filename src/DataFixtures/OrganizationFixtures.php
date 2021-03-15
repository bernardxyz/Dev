<?php

namespace App\DataFixtures;

use App\Entity\Organization;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OrganizationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $organization = new Organization();
        $organization->setName('Leonardo da Vinci');
        $organization->setAddress('1600 Amphitheatre Parkway Mountain View, CA 94043');
        $organization->setEmail('test@gmail.com');
        $organization->setPhoneNumber(123456);

        $organization->setCity($this->getReference('orgCity'));

        $manager->persist($organization);

        $manager->flush();

        $this->addReference('orgNotifications', $organization);
        $this->addReference('raceOrganization', $organization);
        $this->addReference('userOrganization', $organization);
    }

    public function getDependencies(): array
    {
        return [CityFixtures::class];
    }
}
