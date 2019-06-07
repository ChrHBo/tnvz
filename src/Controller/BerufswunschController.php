<?php

namespace App\Controller;

use App\Entity\Berufswunsch;
use App\Form\BerufswunschType;
use App\Repository\BerufswunschRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/berufswunsch")
 */
class BerufswunschController extends AbstractController
{
    /**
     * @Route("/", name="berufswunsch_index", methods={"GET"})
     */
    public function index(BerufswunschRepository $berufswunschRepository): Response
    {
        return $this->render('berufswunsch/index.html.twig', [
            'berufswunsches' => $berufswunschRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="berufswunsch_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $berufswunsch = new Berufswunsch();
        $form = $this->createForm(BerufswunschType::class, $berufswunsch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($berufswunsch);
            $entityManager->flush();

            return $this->redirectToRoute('berufswunsch_index');
        }

        return $this->render('berufswunsch/new.html.twig', [
            'berufswunsch' => $berufswunsch,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="berufswunsch_show", methods={"GET"})
     */
    public function show(Berufswunsch $berufswunsch): Response
    {
        return $this->render('berufswunsch/show.html.twig', [
            'berufswunsch' => $berufswunsch,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="berufswunsch_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Berufswunsch $berufswunsch): Response
    {
        $form = $this->createForm(BerufswunschType::class, $berufswunsch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('berufswunsch_index', [
                'id' => $berufswunsch->getId(),
            ]);
        }

        return $this->render('berufswunsch/edit.html.twig', [
            'berufswunsch' => $berufswunsch,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="berufswunsch_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Berufswunsch $berufswunsch): Response
    {
        if ($this->isCsrfTokenValid('delete'.$berufswunsch->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($berufswunsch);
            $entityManager->flush();
        }

        return $this->redirectToRoute('berufswunsch_index');
    }
}
