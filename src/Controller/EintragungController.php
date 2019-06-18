<?php

namespace App\Controller;

use App\Entity\Eintragung;
use App\Entity\Teilnehmer;
use App\Form\EintragungType;
use App\Repository\EintragungRepository;
use App\Repository\TeilnehmerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/eintragung")
 */
class EintragungController extends AbstractController
{
    /**
     * @Route("/", name="eintragung_index", methods={"GET"})
     */
    public function index(EintragungRepository $eintragungRepository): Response
    {
        return $this->render('eintragung/index.html.twig', [
            'eintragungs' => $eintragungRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="eintragung_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $teilnehmer_id = $request->query->get('id');

        $eintragung = new Eintragung();
        $form = $this->createForm(EintragungType::class, $eintragung);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $teilnehmer = $entityManager->getRepository(Teilnehmer::class)->find($teilnehmer_id);
            $teilnehmer->addEintragungen($eintragung);

            $entityManager->persist($eintragung);
            $entityManager->flush();

            $this->addFlash('success', 'Eintragung wurde angelegt');

            return $this->redirectToRoute('eintragung_index');
        }

        return $this->render('eintragung/new.html.twig', [
            'eintragung' => $eintragung,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="eintragung_show", methods={"GET"})
     */
    public function show(Eintragung $eintragung): Response
    {
        return $this->render('eintragung/show.html.twig', [
            'eintragung' => $eintragung,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="eintragung_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Eintragung $eintragung): Response
    {
        $form = $this->createForm(EintragungType::class, $eintragung);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('eintragung_index', [
                'id' => $eintragung->getId(),
            ]);
        }

        return $this->render('eintragung/edit.html.twig', [
            'eintragung' => $eintragung,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="eintragung_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Eintragung $eintragung): Response
    {
        if ($this->isCsrfTokenValid('delete'.$eintragung->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($eintragung);
            $entityManager->flush();
        }

        return $this->redirectToRoute('eintragung_index');
    }
}
