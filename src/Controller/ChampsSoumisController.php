<?php

namespace App\Controller;

use App\Entity\ChampsSoumis;
use App\Form\ChampsSoumisType;
use App\Repository\ChampsSoumisRepository;
use App\Repository\FormulairesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/champssoumis")
 */
class ChampsSoumisController extends AbstractController
{
    /**
     * @Route("/", name="champs_soumis_index", methods={"GET"})
     */
    public function index(ChampsSoumisRepository $champsSoumisRepository): Response
    {
        return $this->render('champs_soumis/index.html.twig', ['champs_soumis' => $champsSoumisRepository->findAll()]);
    }

    /**
     * @Route("/formUser/{id}", name="form_users", methods={"GET","POST"})
     */
    public function new(Request $request, int $id, FormulairesRepository $fm): Response
    {
        $champsSoumi = new ChampsSoumis();
        $formulaire = $fm->findOneBy(['id'=>$id]);

        $form = $this->createForm(ChampsSoumisType::class, $champsSoumi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($champsSoumi);
            $entityManager->flush();

            return $this->redirectToRoute('validateForm');
        }

        return $this->render('formUsers/formulaireUser.html.twig', [
            'formulaire' => $formulaire,
            'champs_soumi' => $champsSoumi,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/form/validate", name="validateForm", methods={"GET"})
     */
    public function validateUser(): Response
    {
        return $this->render('formUsers/validateForm.html.twig');
    }

    /**
     * @Route("/{id}", name="champs_soumis_show", methods={"GET"})
     */
    public function show(ChampsSoumis $champsSoumi): Response
    {
        return $this->render('champs_soumis/show.html.twig', ['champs_soumi' => $champsSoumi]);
    }

    /**
     * @Route("/{id}/edit", name="champs_soumis_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ChampsSoumis $champsSoumi): Response
    {
        $form = $this->createForm(ChampsSoumisType::class, $champsSoumi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('champs_soumis_index', ['id' => $champsSoumi->getId()]);
        }

        return $this->render('champs_soumis/edit.html.twig', [
            'champs_soumi' => $champsSoumi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="champs_soumis_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ChampsSoumis $champsSoumi): Response
    {
        if ($this->isCsrfTokenValid('delete'.$champsSoumi->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($champsSoumi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('champs_soumis_index');
    }


}
