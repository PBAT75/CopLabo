<?php
namespace App\DataFixtures;

use App\Entity\Partner;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PartnerFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        for ($i=0; $i <=15; $i++) {
            $partner = new Partner();
            $faker  =  Faker\Factory::create('fr_FR');
            $fakerUS = Faker\Factory::create('en_US');
            $partner->setName($fakerUS->name);
            $partner->setAddress($fakerUS->address);
            $partner->setSiret($fakerUS->numberBetween(10000, 21500));
            $partner->setEmail($faker->email);
            $partner->setTel($faker->phoneNumber);

            $this->addReference('partner_'.$i, $partner);
            $manager->persist($partner);
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