<?php

namespace App\Controller;

use App\Entity\Attribution;
use App\Form\AttributionType;
use App\Repository\EvenementsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AttributionController extends AbstractController
{
    /**
     * @Route("/attribution/{id}/edit", name="attribution_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EvenementsRepository $evenementsRepository, int $id): Response
    {
        $attribution = new Attribution();
        $evenement = $evenementsRepository->findOneBy(['id' =>$id]);
        $form = $this->createForm(AttributionType::class, $attribution );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('attribution', ['id' => $evenement->getId()]);
        }

        return $this->render('attribution/index.html.twig', [
            'evenement' => $evenement,
            'attribution' => $attribution,
            'form' => $form->createView()
        ]);
    }
}
