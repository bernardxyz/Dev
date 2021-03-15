<?php

namespace App\DataFixtures;

use App\Entity\Race;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RaceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $race = new Race();
        $race->setLocation('Mostar');
        $race->setRegistrationDate(DateTime::createFromFormat('Y-m-d', "2021-03-12"));
        $race->setRaceLength(35.5);
        $race->setTotalCheckPoints(10);
        $race->setStartTime(DateTime::createFromFormat('H:i', "12:00"));
        $race->setMaxTime(DateTime::createFromFormat('H:i', "12:00"));

        $race->setCity($this->getReference('raceCity'));
        $race->setRacetype($this->getReference('raceType'));
        $race->setOrganization($this->getReference('raceOrganization'));

        $manager->persist($race);

        $manager->flush();

        $this->addReference('raceCheckPoint', $race);
        $this->addReference('raceStatus', $race);
    }

    public function getDependencies(): array
    {
        return [CityFixtures::class];
    }
}
