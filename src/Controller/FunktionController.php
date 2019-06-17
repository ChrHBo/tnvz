<?php

namespace App\Controller;

use App\Entity\Funktion;
use App\Form\FunktionType;
use App\Repository\FunktionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/funktion")
 */
class FunktionController extends AbstractController
{
    /**
     * @Route("/", name="funktion_index", methods={"GET"})
     */
    public function index(FunktionRepository $funktionRepository): Response
    {
        return $this->render('funktion/index.html.twig', [
            'funktions' => $funktionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="funktion_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $funktion = new Funktion();
        $form = $this->createForm(FunktionType::class, $funktion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($funktion);
            $entityManager->flush();

            $this->addFlash('success', 'Funktion wurde angelegt');

            return $this->redirectToRoute('funktion_index');
        }

        return $this->render('funktion/new.html.twig', [
            'funktion' => $funktion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="funktion_show", methods={"GET"})
     */
    public function show(Funktion $funktion): Response
    {
        return $this->render('funktion/show.html.twig', [
            'funktion' => $funktion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="funktion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Funktion $funktion): Response
    {
        $form = $this->createForm(FunktionType::class, $funktion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('funktion_index', [
                'id' => $funktion->getId(),
            ]);
        }

        return $this->render('funktion/edit.html.twig', [
            'funktion' => $funktion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="funktion_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Funktion $funktion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$funktion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($funktion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('funktion_index');
    }
}
