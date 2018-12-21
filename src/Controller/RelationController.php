<?php

namespace App\Controller;

use App\Entity\Relation;
use App\Form\RelationType;
use App\Repository\PersonRepository;
use App\Repository\RelationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/relation")
 */
class RelationController extends AbstractController
{
    /**
     * @Route("/", name="relation_index", methods={"GET"})
     */
    public function index(RelationRepository $relationRepository, PersonRepository $personRepository): Response
    {
        return $this->render('relation/index.html.twig', [
            'relations' => $relationRepository->findAll(),
            'persons'=>$personRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="relation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $relation = new Relation();
        $form = $this->createForm(RelationType::class, $relation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($relation);
            $entityManager->flush();

            return $this->redirectToRoute('relation_index');
        }

        return $this->render('relation/new.html.twig', [
            'relation' => $relation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="relation_show", methods={"GET"})
     */
    public function show(Relation $relation): Response
    {
        return $this->render('relation/show.html.twig', ['relation' => $relation]);
    }

    /**
     * @Route("/{id}/edit", name="relation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Relation $relation): Response
    {
        $form = $this->createForm(RelationType::class, $relation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('relation_index', ['id' => $relation->getId()]);
        }

        return $this->render('relation/edit.html.twig', [
            'relation' => $relation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="relation_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Relation $relation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$relation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($relation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('relation_index');
    }
}
