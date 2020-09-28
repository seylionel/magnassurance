<?php

namespace App\Controller;

use App\Entity\Cars;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {

        $cars = $this->getDoctrine()

            /** @var Cars[] $cars */
            ->getRepository(Cars::class)
            ->findAll();

        return $this->render("default/index.html.twig",[
            "cars" => $cars
        ]);
    }

}
