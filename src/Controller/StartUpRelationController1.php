<?php

namespace App\Controller;

use App\Entity\StartUpRelation;
use App\Repository\StartUpRepository;
use App\Form\StartUpRelationType;
use App\Repository\StartUpRelationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/startup/relation")
 */
class StartUpRelationController1 extends AbstractController
{
    /**
     * @Route("/", name="start_up_relation_index", methods={"GET"})
     */
    public function index(StartUpRelationRepository $startUpRelationRepository): Response
    {
        return $this->render('start_up_relation/index.html.twig', ['start_up_relations' => $startUpRelationRepository->findAll()]);
    }


    /**
     * @Route("/new", name="start_up_relation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $startUpRelation = new StartUpRelation();
        $form = $this->createForm(StartUpRelationType::class, $startUpRelation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($startUpRelation);
            $entityManager->flush();

            return $this->redirectToRoute('start_up_relation_index');
        }

        return $this->render('start_up_relation/new.html.twig', [
            'start_up_relation' => $startUpRelation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="start_up_relation_show", methods={"GET"})
     */
    public function show(StartUpRelation $startUpRelation): Response
    {
        return $this->render('start_up_relation/show.html.twig', ['start_up_relation' => $startUpRelation]);
    }

    /**
     * @Route("/{id}/edit", name="start_up_relation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, StartUpRelation $startUpRelation): Response
    {
        $form = $this->createForm(StartUpRelation1Type::class, $startUpRelation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('start_up_relation_index', ['id' => $startUpRelation->getId()]);
        }

        return $this->render('start_up_relation/edit.html.twig', [
            'start_up_relation' => $startUpRelation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="start_up_relation_delete", methods={"DELETE"})
     */
    public function delete(Request $request, StartUpRelation $startUpRelation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$startUpRelation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($startUpRelation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('start_up_relation_index');
    }
}
