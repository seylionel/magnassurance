<?php


namespace App\DataFixtures;

use App\Entity\Car;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;

use Doctrine\Persistence\ObjectManager;


class CarFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $cars1 = new Car();
        $cars1 -> setModel("206");
        $cars1 -> setBrand("Peugeot");
        $cars1 -> setPower('6');
        $cars1 -> setGas('essence');
        $cars1 -> setRegistration('AXE-245-XDE');
        $cars1 -> setInsuranceExist(true);
        $cars1 -> setProspect($this->getReference("name-prospect1"));
        $manager->persist($cars1);
        $this->addReference("insurance-peugeot", $cars1);

        $cars2 = new Car();
        $cars2 -> setModel("C3");
        $cars2 -> setBrand("Citroën");
        $cars2 -> setPower('5');
        $cars2 -> setGas('diesel');
        $cars2 -> setRegistration('AB-123-CD');
        $cars2 -> setInsuranceExist(true);
        $cars2 -> setProspect($this->getReference("name-prospect2"));
        $manager->persist($cars2);
        $this->addReference("insurance-citröen", $cars2);

        $manager->flush();

    }

    public function getDependencies()
    {
        return [
            ProspectFixtures::class,
        ];
    }

}