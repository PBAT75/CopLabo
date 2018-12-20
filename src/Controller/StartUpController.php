<?php

namespace App\Controller;

use App\Entity\StartUp;
use App\Entity\StartUpRelation;
use App\Form\StartUpRelationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/start/up", name="start_up_")
 */
class StartUpController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('start_up/index.html.twig', [
            'controller_name' => 'StartUpController',
        ]);
    }

//    /**
//     * @Route("/{id}/show/action", name="show_action")
//     */
//    public function showAction(StartUp $startUp ,Request $request)
//    {
//        $startUpRelation = new StartUpRelation();
//        $form = $this->createForm(StartUpRelationType::class, $startUpRelation);
//        $form->handleRequest($request);
//
//
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $entityManager = $this->getDoctrine()->getManager();
//
//            $entityManager->persist($startUpRelation);
//            $entityManager->flush();
//
//            return $this->render('start_up/showAction.html.twig', [
//                'id' => $startUp->getId(),
//                'startUp'=>$startUp,
//                'startUpRelation'=>$startUpRelation
//            ]);
//        }
//
//        return $this->render('start_up/showAction.html.twig', [
//            'id' => $startUp->getId(),
//            'startUp'=>$startUp,
//            'startUpRelation'=>$startUpRelation,
//            'form' => $form->createView(),
//        ]);
//    }

}
