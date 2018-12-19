<?php
namespace App\DataFixtures;

use App\Entity\ExternalCompany;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ExternalCompanyFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        for ($i=0; $i <=15; $i++) {
            $externalCompany = new ExternalCompany();
            $faker  =  Faker\Factory::create('fr_FR');
            $fakerUS = Faker\Factory::create('en_US');
            $externalCompany->setName($fakerUS->name);
            $externalCompany->setAddress($fakerUS->address);
            $externalCompany->setSiret($fakerUS->numberBetween(10000, 21500));
            $externalCompany->setEmail($faker->email);
            $externalCompany->setTel($faker->phoneNumber);

            $this->addReference('external_company_'.$i, $externalCompany);
            $manager->persist($externalCompany);
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