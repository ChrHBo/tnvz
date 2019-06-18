<?php

namespace App\Controller;

use App\Entity\Massnahme;
use App\Entity\Teilnehmer;
use App\Form\MassnahmeType;
use App\Repository\MassnahmeRepository;
use App\Repository\TeilnehmerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/massnahme")
 */
class MassnahmeController extends AbstractController
{
    /**
     * @Route("/", name="massnahme_index", methods={"GET"})
     */
    public function index(MassnahmeRepository $massnahmeRepository): Response
    {
        return $this->render('massnahme/index.html.twig', [
            'massnahmes' => $massnahmeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="massnahme_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {

        $teilnehmer_id = $request->query->get('id');
        
        $massnahme = new Massnahme();
        $form = $this->createForm(MassnahmeType::class, $massnahme);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            
            $teilnehmer = $entityManager->getRepository(Teilnehmer::class)->find($teilnehmer_id);
            $teilnehmer->addMassnahman($massnahme);
            
            $entityManager->persist($massnahme);
            $entityManager->flush();

            $this->addFlash('success', 'Massnahme wurde angelegt');

            return $this->redirectToRoute('massnahme_index');
        }

        return $this->render('massnahme/new.html.twig', [
            'massnahme' => $massnahme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="massnahme_show", methods={"GET"})
     */
    public function show(Massnahme $massnahme): Response
    {
        return $this->render('massnahme/show.html.twig', [
            'massnahme' => $massnahme,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="massnahme_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Massnahme $massnahme): Response
    {
        $form = $this->createForm(MassnahmeType::class, $massnahme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('massnahme_index', [
                'id' => $massnahme->getId(),
            ]);
        }

        return $this->render('massnahme/edit.html.twig', [
            'massnahme' => $massnahme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="massnahme_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Massnahme $massnahme): Response
    {
        if ($this->isCsrfTokenValid('delete'.$massnahme->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($massnahme);
            $entityManager->flush();
        }

        return $this->redirectToRoute('massnahme_index');
    }
}
