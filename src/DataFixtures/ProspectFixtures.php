<?php


namespace App\DataFixtures;

use App\Entity\Prospect;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


use Doctrine\Persistence\ObjectManager;

class ProspectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $prospect1 = new Prospect();
        $prospect1 -> setLastName("Seymour");
        $prospect1 -> setFirstName("Lionel");
        $prospect1 -> setBirthdate (new \DateTime('28-02-1996'));
        $prospect1 -> setEmail('seymlionel@gmail.com');
        $prospect1 -> setPhoneNumber('0698384729');
        $prospect1 -> setGuid('2');
        $prospect1 -> setCreatedAt (new \DateTime('00:13:50'));
        $prospect1 -> setCity($this->getReference("city1-rennes"));
        $manager->persist($prospect1);
        $this->addReference("name-prospect1", $prospect1);

        $prospect2 = new Prospect();
        $prospect2 -> setLastName("Lee");
        $prospect2 -> setFirstName("Jack");
        $prospect2 -> setBirthdate (new \DateTime('21-09-1968'));
        $prospect2 -> setEmail('jack@gmail.com');
        $prospect2 -> setPhoneNumber('0698369745');
        $prospect2 -> setGuid('3');
        $prospect2 -> setCreatedAt (new \DateTime('00:15:00'));
        $prospect2 -> setCity($this->getReference("city2-vern"));
        $manager->persist($prospect2);
        $this->addReference("name-prospect2", $prospect2);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CityFixtures::class
        ];
    }

}