<?php


namespace App\DataFixtures;


use App\Entity\City;

use App\Entity\Quote;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use Doctrine\Persistence\ObjectManager;

class QuoteFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $quote1 = new Quote();
        $quote1 -> setProspect($this->getReference("name-prospect1"));
        $quote1 -> setAgency($this->getReference("agency1-groupama"));
        $quote1 -> setFileName("devis 001");
        $quote1 -> setQuoteValidation(true);
        $manager->persist($quote1);
        $this->addReference("quote1-001",$quote1);



        $manager->flush();


    }

    public function getDependencies()
    {
        return [
            ProspectFixtures::class,
            AgencyFixtures::class
        ];
    }


}