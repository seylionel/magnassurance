<?php

namespace App\Controller;

use App\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {

        $car = $this->getDoctrine()

            /** @var Car[] $car */
            ->getRepository(Car::class)
            ->findAll();

        return $this->render("default/index.html.twig",[
            "car" => $car
        ]);
    }

}
