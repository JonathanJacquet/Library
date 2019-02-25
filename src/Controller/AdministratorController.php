<?php

namespace App\Controller;

use App\Entity\Administrator;
use App\Form\AdministratorType;
use App\Repository\AdministratorRepository;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/Administrator")
 */
class AdministratorController extends AbstractController
{
    /**
     * @Route("/", name="Administrator_home", methods={"GET"})
     */
    public function home()
    {
        return $this->render('user/home.html.twig');

    }

    /**
     * @Route("/list", name="Administrator_index", methods={"GET"})
     */
    public function index(AdministratorRepository $AdministratorRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'Administrators' => $AdministratorRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="Administrator_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $Administrator = new Administrator();
        $form = $this->createForm(AdministratorType::class, $Administrator);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($Administrator);
            $entityManager->flush();

            return $this->redirectToRoute('Administrator_index');
        }

        return $this->render('user/new.html.twig', [
            'Administrator' => $Administrator,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="Administrator_show", methods={"GET"})
     */
    public function show(Administrator $Administrator, BookRepository $bookRepository): Response
    {
        $books = $bookRepository->findByAdministrator($Administrator->getId());
        return $this->render('user/show.html.twig', [
            'Administrator' => $Administrator,
            'books' => $books
        ]);
    }

    /**
     * @Route("/{id}/edit", name="Administrator_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Administrator $Administrator): Response
    {
        $form = $this->createForm(AdministratorType::class, $Administrator);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Administrator_index', [
                'id' => $Administrator->getId(),
            ]);
        }

        return $this->render('user/edit.html.twig', [
            'Administrator' => $Administrator,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="Administrator_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Administrator $Administrator): Response
    {
        if ($this->isCsrfTokenValid('delete'.$Administrator->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($Administrator);
            $entityManager->flush();
        }

        return $this->redirectToRoute('Administrator_index');
    }

    /**
     * @Route("/login", name="Administrator_login", methods={"GET", "POST")
     */
     // public function login(Request $request): Response  {
     //   $form = $this->createForm(LoginType::class, $Administrator);
     //   $form->handlerequest($request);
     //   return $this->render('Administrator/loginForm.html.twig', [
     //     'form' => $form->createView(),
     //   ]);
     // }

}
