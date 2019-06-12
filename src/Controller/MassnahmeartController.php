<?php

namespace App\Controller;

use App\Entity\Massnahmeart;
use App\Form\MassnahmeartType;
use App\Repository\MassnahmeartRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/massnahmeart")
 */
class MassnahmeartController extends AbstractController
{
    /**
     * @Route("/", name="massnahmeart_index", methods={"GET"})
     */
    public function index(MassnahmeartRepository $massnahmeartRepository): Response
    {
        return $this->render('massnahmeart/index.html.twig', [
            'massnahmearts' => $massnahmeartRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="massnahmeart_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $massnahmeart = new Massnahmeart();
        $form = $this->createForm(MassnahmeartType::class, $massnahmeart);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($massnahmeart);
            $entityManager->flush();

            return $this->redirectToRoute('massnahmeart_index');
        }

        return $this->render('massnahmeart/new.html.twig', [
            'massnahmeart' => $massnahmeart,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="massnahmeart_show", methods={"GET"})
     */
    public function show(Massnahmeart $massnahmeart): Response
    {
        return $this->render('massnahmeart/show.html.twig', [
            'massnahmeart' => $massnahmeart,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="massnahmeart_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Massnahmeart $massnahmeart): Response
    {
        $form = $this->createForm(MassnahmeartType::class, $massnahmeart);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('massnahmeart_index', [
                'id' => $massnahmeart->getId(),
            ]);
        }

        return $this->render('massnahmeart/edit.html.twig', [
            'massnahmeart' => $massnahmeart,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="massnahmeart_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Massnahmeart $massnahmeart): Response
    {
        if ($this->isCsrfTokenValid('delete'.$massnahmeart->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($massnahmeart);
            $entityManager->flush();
        }

        return $this->redirectToRoute('massnahmeart_index');
    }
}
