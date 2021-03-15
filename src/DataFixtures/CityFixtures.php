<?php

namespace App\DataFixtures;

use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CityFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $city = new City();
        $city->setName("Zagreb");

        $city->setCountry($this->getReference('city'));

        $manager->persist($city);
        $manager->flush();

        $this->addReference('userCity', $city);
        $this->addReference('orgCity', $city);
        $this->addReference('raceCity', $city);
    }

    public function getDependencies(): array
    {
        return [CountryFixtures::class];
    }
}
