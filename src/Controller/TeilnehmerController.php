<?php

namespace App\Controller;

use App\Entity\Teilnehmer;
use App\Form\TeilnehmerType;
use App\Repository\TeilnehmerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/teilnehmer")
 */
class TeilnehmerController extends AbstractController
{

    /**
     * Suchfuntion.
     * 
     * Nimmt GET Variable q entgegen und übergibt sie der Mehode
     * findAllWithSearch() im Repository zur Abfrage der Datenbank
     * 
     * @Route("/search", name="teilnehmer_search", methods={"GET"})
     * 
     * @param  Request               $request       Request instance
     * @param  string                $q             Search term
     * @param  TeilnehmerRepository  $repository    Database
     * @return Response              teilnehmers[]  Response instance
     */
    public function searchAction(TeilnehmerRepository $repository, Request $request)
    {
        
        $q = $request->query->get('q');
        $teilnehmer = $repository->findAllWithSearch($q);

        return $this->render('teilnehmer/search.html.twig', [
            'teilnehmers' => $teilnehmer,

        ]);
    }
    
    /**
     * @Route("/", name="teilnehmer_index", methods={"GET"})
     */
    public function index(TeilnehmerRepository $teilnehmerRepository): Response
    {
        return $this->render('teilnehmer/index.html.twig', [
            'teilnehmers' => $teilnehmerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="teilnehmer_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $teilnehmer = new Teilnehmer();
        $form = $this->createForm(TeilnehmerType::class, $teilnehmer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($teilnehmer);
            $entityManager->flush();

            return $this->redirectToRoute('teilnehmer_index');
        }

        return $this->render('teilnehmer/new.html.twig', [
            'teilnehmer' => $teilnehmer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="teilnehmer_show", methods={"GET"})
     */
    public function show(Teilnehmer $teilnehmer): Response
    {
        return $this->render('teilnehmer/show.html.twig', [
            'teilnehmer' => $teilnehmer,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="teilnehmer_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Teilnehmer $teilnehmer): Response
    {
        $form = $this->createForm(TeilnehmerType::class, $teilnehmer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('teilnehmer_index', [
                'id' => $teilnehmer->getId(),
            ]);
        }

        return $this->render('teilnehmer/edit.html.twig', [
            'teilnehmer' => $teilnehmer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="teilnehmer_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Teilnehmer $teilnehmer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$teilnehmer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($teilnehmer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('teilnehmer_index');
    }

}
