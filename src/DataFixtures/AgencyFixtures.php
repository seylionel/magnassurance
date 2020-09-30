<?php


namespace App\DataFixtures;

use App\Entity\Agency;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use Doctrine\Persistence\ObjectManager;

class AgencyFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $agency1 = new Agency();
        $agency1 -> setName("Agence Groupama Jacob");
        $agency1 -> setPhoneNumber("0698434856");
        $agency1 -> addCity($this->getReference("city1-rennes"));
        $agency1 -> setUser($this->getReference("user1-groupama"));
        $manager->persist($agency1);
        $this ->addReference("agency1-groupama", $agency1);

        $agency2 = new Agency();
        $agency2 -> setName("Agence Axa RUTZ");
        $agency2 -> setPhoneNumber("0698648390");
        $agency2 -> addCity($this->getReference("city2-Vern"));
        $agency2 -> setUser($this->getReference("user1-axa"));
        $manager->persist($agency2);
        $this ->addReference("agency2-axa", $agency2);

        $manager->flush();


    }

    public function getDependencies()
    {
        return [
            AgencyFixtures::class,
        ];
    }


}