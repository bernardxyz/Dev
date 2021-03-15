<?php


namespace App\DataFixtures;

use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstName('Bruce');
        $user->setLastName('Wayne');
        $user->setSex(true);
        $user->setEmail('test@gmail.com');
        $user->setBirthDate(DateTime::createFromFormat('Y-m-d', "2018-09-09"));
        $user->setPassword($this->encoder->encodePassword($user, 'password'));

        $user->setCity($this->getReference('userCity'));
        $user->setUserType($this->getReference('userType'));
        $user->setOrganization($this->getReference('userOrganization'));

        $manager->persist($user);
        $manager->flush();

        $this->addReference('Notifications', $user);
        $this->addReference('userCheckPoint', $user);
        $this->addReference('userNotifications', $user);
        $this->addReference('userStatus', $user);
    }

    public function getDependencies(): array
    {
        return [CityFixtures::class];
    }
}