<?php



namespace App\Controller;

use App\Entity\Agency;
use App\Entity\Car;
use App\Entity\City;
use App\Entity\Quote;
use App\Entity\User;
use App\Entity\Prospect;
use App\Form\UserType;
use App\Repository\AgencyRepository;
use App\Repository\CarRepository;
use App\Repository\QuoteRepository;
use App\Repository\UserRepository;
use App\Repository\ProspectRepository;
use Doctrine\ORM\Query\Expr\Select;
use PhpParser\Node\Expr\New_;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository, ProspectRepository $prospectRepository): Response
    {

        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
            'prospects' => $prospectRepository->findAll(),

        ]);
    }

    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($user);

            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/infoProspect", name="user_infoProspects", methods={"GET","POST"})
     **/
    public function getInfo(): Response
    {

        return $this->render('user/_infoProspect.html.twig');
    }

    /**
     * @Route("/individualQuote/{id}", name="user_individualQuote", methods={"GET","POST"})
     *
     **/
    public function getIndividualQuote(Prospect $prospect): Response
    {


        return $this->render('user/_individualQuote.html.twig', [
            'prospects' => $prospect,



        ]);
    }




    /**
     * @Route("/{id}", name="user_show", methods={"GET","POST"})
     */
    public function show(User $user, QuoteRepository $quoteRepository, AgencyRepository $agencyRepository): Response
    {


        return $this->render('user/show.html.twig', [
            'user' => $user,
            'quotes'=>$quoteRepository

        ]);
    }





    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }




}

