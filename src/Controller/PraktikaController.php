<?php

namespace App\Controller;

use App\Entity\Praktika;
use App\Form\PraktikaType;
use App\Repository\PraktikaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/praktika")
 */
class PraktikaController extends AbstractController
{
    /**
     * @Route("/", name="praktika_index", methods={"GET"})
     */
    public function index(PraktikaRepository $praktikaRepository): Response
    {
        return $this->render('praktika/index.html.twig', [
            'praktikas' => $praktikaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="praktika_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $praktika = new Praktika();
        $form = $this->createForm(PraktikaType::class, $praktika);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($praktika);
            $entityManager->flush();

            return $this->redirectToRoute('praktika_index');
        }

        return $this->render('praktika/new.html.twig', [
            'praktika' => $praktika,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="praktika_show", methods={"GET"})
     */
    public function show(Praktika $praktika): Response
    {
        return $this->render('praktika/show.html.twig', [
            'praktika' => $praktika,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="praktika_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Praktika $praktika): Response
    {
        $form = $this->createForm(PraktikaType::class, $praktika);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('praktika_index', [
                'id' => $praktika->getId(),
            ]);
        }

        return $this->render('praktika/edit.html.twig', [
            'praktika' => $praktika,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="praktika_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Praktika $praktika): Response
    {
        if ($this->isCsrfTokenValid('delete'.$praktika->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($praktika);
            $entityManager->flush();
        }

        return $this->redirectToRoute('praktika_index');
    }
}
