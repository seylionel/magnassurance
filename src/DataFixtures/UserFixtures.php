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



        $manager->flush();
    }

}