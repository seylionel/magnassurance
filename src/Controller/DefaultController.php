<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Prospect;
use App\Entity\User;
use App\Form\ProspectType;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(Request $request)
    {
        $prospect = new Prospect();

        $form = $this->createForm(ProspectType::class, $prospect);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $prospect->setGuid(substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 8));


            //si la city entrée est égale à la city d'une agence alors envoi la city dans cette agence
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($prospect);
            //TODO: boucle: tant que le GUID existe générer un nouveau guid
            $entityManager->flush();

            return $this->redirectToRoute('car_new', ['guid' => $prospect->getGuid()]);
        }

        return $this->render("default/index.html.twig",[
            "formMain"=> $form->createView()
        ]);
    }


}
