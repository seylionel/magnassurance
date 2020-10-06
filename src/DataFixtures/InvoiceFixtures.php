<?php


namespace App\DataFixtures;

use App\Entity\City;
use App\Entity\Invoice;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use Doctrine\Persistence\ObjectManager;

class InvoiceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $invoice1 = new Invoice();
        $invoice1 -> setFilename("facture 1");
        $invoice1 -> setCreatedAt(new \DateTime("30-09-2020"));
        $invoice1 -> setUser($this->getReference("user1-jmathieu"));
        $manager->persist($invoice1);
        $this ->addReference("invoice-fact1", $invoice1);

        $invoice2 = new Invoice();
        $invoice2 -> setFilename("facture 2");
        $invoice2 -> setCreatedAt(new \DateTime("30-09-2020"));
        $invoice2 -> setUser($this->getReference("user2-rfranck"));
        $manager->persist($invoice2);
        $this ->addReference("invoice-fact2", $invoice2);

        $manager->flush();


    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }


}