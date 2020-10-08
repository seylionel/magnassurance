<?php


namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1-> setBirthdate(new \DateTime("08-05-1972"));
        $user1-> setLastName("Jacob");
        $user1-> setFirstName("Mathieu");
        $user1->setPassword($this->encoder->encodePassword($user1, "1234"));
        $user1->setEmail("seymourlionel97@gmail.com");
        $user1->setCredit(400);
        $user1->setRoles(["ROLE_ADMIN"]);
        $manager->persist($user1);
        $this->addReference("user1-jmathieu", $user1);

        $user2 = new User();
        $user2-> setBirthdate(new \DateTime("02-04-1955"));
        $user2-> setLastName("Rutz");
        $user2-> setFirstName("Franck");
        $user2->setPassword($this->encoder->encodePassword($user1, "1234"));
        $user2->setEmail("kraksize@gmail.com");
        $user2->setCredit(278);
        $manager->persist($user2);
        $this->addReference("user2-rfranck", $user2);



        $manager->flush();
    }

}