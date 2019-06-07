<?php

namespace App\Controller;

use App\Entity\Eintragsbereich;
use App\Form\EintragsbereichType;
use App\Repository\EintragsbereichRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/eintragsbereich")
 */
class EintragsbereichController extends AbstractController
{
    /**
     * @Route("/", name="eintragsbereich_index", methods={"GET"})
     */
    public function index(EintragsbereichRepository $eintragsbereichRepository): Response
    {
        return $this->render('eintragsbereich/index.html.twig', [
            'eintragsbereiches' => $eintragsbereichRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="eintragsbereich_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $eintragsbereich = new Eintragsbereich();
        $form = $this->createForm(EintragsbereichType::class, $eintragsbereich);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($eintragsbereich);
            $entityManager->flush();

            return $this->redirectToRoute('eintragsbereich_index');
        }

        return $this->render('eintragsbereich/new.html.twig', [
            'eintragsbereich' => $eintragsbereich,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="eintragsbereich_show", methods={"GET"})
     */
    public function show(Eintragsbereich $eintragsbereich): Response
    {
        return $this->render('eintragsbereich/show.html.twig', [
            'eintragsbereich' => $eintragsbereich,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="eintragsbereich_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Eintragsbereich $eintragsbereich): Response
    {
        $form = $this->createForm(EintragsbereichType::class, $eintragsbereich);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('eintragsbereich_index', [
                'id' => $eintragsbereich->getId(),
            ]);
        }

        return $this->render('eintragsbereich/edit.html.twig', [
            'eintragsbereich' => $eintragsbereich,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="eintragsbereich_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Eintragsbereich $eintragsbereich): Response
    {
        if ($this->isCsrfTokenValid('delete'.$eintragsbereich->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($eintragsbereich);
            $entityManager->flush();
        }

        return $this->redirectToRoute('eintragsbereich_index');
    }
}
