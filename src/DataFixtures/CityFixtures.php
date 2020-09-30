<?php


namespace App\DataFixtures;


use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use Doctrine\Persistence\ObjectManager;

class CityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $city1 = new City();
        $city1 -> setName("Rennes");
        $city1 -> setCp("35000");
        $manager->persist($city1);
        $this ->addReference("city1-rennes", $city1);

        $city2 = new City();
        $city2 -> setName("Vern");
        $city2 -> setCp("35770");
        $manager->persist($city2);
        $this ->addReference("city2-vern", $city2);

        $manager->flush();


    }

    public function getDependencies()
    {
        return [
            ProspectFixtures::class,
        ];
    }


}