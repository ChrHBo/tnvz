<?php

namespace App\Controller;

use App\Entity\Mitarbeiter;
use App\Form\MitarbeiterType;
use App\Repository\MitarbeiterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/mitarbeiter")
 */
class MitarbeiterController extends AbstractController
{
    /**
     * Index.
     * 
     * Listet die Ergebnis mit Pagination auf
     * @Route("/", name="mitarbeiter_index", methods={"GET"})
     */
    public function index(Request $request,MitarbeiterRepository $mitarbeiterRepository, PaginatorInterface $paginator): Response
    {
        $query = $this->getDoctrine()
        ->getRepository(Mitarbeiter::class)
        ->findAll();
        
        $result = $paginator->paginate(
        $query, 
        $request->query->getInt('page', 1), 
        $request->query->getInt('limit', 5)
    );

        return $this->render('mitarbeiter/index.html.twig',
            array('pagination' => $result));
    }

    /**
     * @Route("/new", name="mitarbeiter_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $mitarbeiter = new Mitarbeiter();
        $form = $this->createForm(MitarbeiterType::class, $mitarbeiter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($mitarbeiter);
            $entityManager->flush();

            $this->addFlash('success', 'Mitarbeiter wurde angelegt');

            return $this->redirectToRoute('mitarbeiter_index');
        }

        return $this->render('mitarbeiter/new.html.twig', [
            'mitarbeiter' => $mitarbeiter,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mitarbeiter_show", methods={"GET"})
     */
    public function show(Mitarbeiter $mitarbeiter): Response
    {
        return $this->render('mitarbeiter/show.html.twig', [
            'mitarbeiter' => $mitarbeiter,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="mitarbeiter_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Mitarbeiter $mitarbeiter): Response
    {
        $form = $this->createForm(MitarbeiterType::class, $mitarbeiter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mitarbeiter_index', [
                'id' => $mitarbeiter->getId(),
            ]);
        }

        return $this->render('mitarbeiter/edit.html.twig', [
            'mitarbeiter' => $mitarbeiter,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mitarbeiter_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Mitarbeiter $mitarbeiter): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mitarbeiter->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($mitarbeiter);
            $entityManager->flush();
        }

        return $this->redirectToRoute('mitarbeiter_index');
    }
}
