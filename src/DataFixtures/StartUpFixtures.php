<?php
namespace App\DataFixtures;

use App\Entity\StartUp;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class StartUpFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        for ($i=0; $i <=15; $i++) {
            $startUp = new StartUp();
            $faker  =  Faker\Factory::create('fr_FR');
            $fakerUS = Faker\Factory::create('en_US');
            $startUp->setName($fakerUS->name);
            $startUp->setAddress($fakerUS->address);
            $startUp->setSiret($fakerUS->numberBetween(10000, 21500));
            $startUp->setEmail($faker->email);
            $startUp->setTel($faker->phoneNumber);

            $this->addReference('startUp_'.$i, $startUp);
            $manager->persist($startUp);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}