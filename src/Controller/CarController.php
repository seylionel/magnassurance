<?php

namespace App\Controller;

use App\Entity\Car;

use App\Entity\Prospect;
use App\Entity\Quote;
use App\Entity\User;
use App\Form\CarType;
use App\Repository\AgencyRepository;
use App\Repository\CarRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/car")
 */
class CarController extends AbstractController
{
    /**
     * @Route("/", name="car_index", methods={"GET"})
     */
    public function index(CarRepository $carRepository): Response
    {
        return $this->render('car/index.html.twig', [
            'cars' => $carRepository->findAll(),

        ]);
    }

    /**
     * @Route("/carChoice", name="car_choice", methods={"GET"})
     */
    public function choice(CarRepository $carRepository): Response
    {
        return $this->render('category/car.html.twig', [
            'cars' => $carRepository->findAll(),
        ]);
    }



    /**
     * @Route("/new/{guid}", name="car_new", methods={"GET","POST"})
     */
    public function new(Request $request, Prospect $prospect, AgencyRepository $agencyRepository): Response
    {
        $car = new Car();
        $car->setProspect($prospect);
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($car);

            // Boucler sur l'ensemble des utilisateurs
            foreach ($agencyRepository->findAllWithCreditsInCity($prospect->getCity()) as $agency) {
                // Créer le devis
                $quote = new Quote();
                $quote->setProspect($prospect);
                $quote->setAgency($agency);
                $entityManager->persist($quote);

                // Décrémenter les crédits restant
                $user = $agency->getUser();
                $user->setCredit($user->getCredit() - 1);
                $entityManager->persist($user);
            }

            $entityManager->flush();


            // TODO: rechercher agences à notifier et les associer au prospect
            //
            //
            //
            //
            // et décrémenter/ boucler sur toutes les gences qui ont des crédits et vérifier pour chaque agences, s'il elles sont associeé à la ville du prospect

            return $this->redirectToRoute('user_infoProspects',['cities' => $prospect->getCity()]);
        }

        return $this->render('car/new.html.twig', [
            'car' => $car,
            'form' => $form->createView(),

        ]);
    }

    /**
     * @Route("/{id}", name="car_show", methods={"GET"})
     */
    public function show(Car $car): Response
    {
        return $this->render('car/show.html.twig', [
            'car' => $car,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="car_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Car $car): Response
    {
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('car_index');
        }

        return $this->render('car/edit.html.twig', [
            'car' => $car,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="car_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Car $car): Response
    {
        if ($this->isCsrfTokenValid('delete'.$car->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($car);
            $entityManager->flush();
        }

        return $this->redirectToRoute('car_index');
    }
}
