<?php

namespace App\Controller;


use App\Entity\Prospect;
use App\Form\ProspectType;
use App\Repository\ProspectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/prospectBoard")
 */
class ProspectBoardController extends AbstractController
{
    /**
     * @Route("/", name="prospectBoard_index", methods={"GET", "POST"})
     */
    public function index(Request $request, ProspectRepository $prospectRepository): Response
    {

        $prospect = new Prospect();
        $form = $this->createFormBuilder($prospect)
            ->add('guid')
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $searchProspect = $prospectRepository->findOneByGuid($prospect->getGuid());
            if ($searchProspect !== null) {
                return $this->redirectToRoute('guid_dashboard');
            }
        }

        return $this->render('prospect/prospectBoard/login.html.twig', [
            'prospect' => $prospectRepository->findAll(),
            'form' => $form->createView()
        ]);
    }



}
