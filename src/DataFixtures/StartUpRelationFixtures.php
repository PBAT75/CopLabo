<?php
namespace App\DataFixtures;

use App\Entity\StartUpRelation;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class StartUpRelationFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        for ($i=1; $i <=15; $i++) {
            $startUpRelation = new StartUpRelation();
            $faker  =  Faker\Factory::create('fr_FR');
            $fakerUS = Faker\Factory::create('en_US');
            $startUpRelation->setAction($fakerUS->sentence(2));
            $startUpRelation->setDate($fakerUS->dateTime);
            $startUpRelation->setOther($fakerUS->text);

            $startUpRelation->setStartUp(
                $this->getReference('startUp_'.$i)
            );
            $startUpRelation->setPartner(
                $this->getReference('partner_'.$i)
            );
            $startUpRelation->setExternalCompany(
                $this->getReference('external_company_'.$i)
            );

            $manager->persist($startUpRelation);
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