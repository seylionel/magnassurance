<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
