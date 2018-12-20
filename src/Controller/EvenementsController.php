<?php

namespace App\Controller;

use App\Entity\Evenements;
use App\Entity\Formulaires;
use App\Entity\StartUp;
use App\Form\EvenementsType;
use App\Form\MailingType;
use App\Form\SendingMailType;
use App\Repository\EvenementsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/evenements")
 */
class EvenementsController extends AbstractController
{
    /**
     * @Route("/", name="evenements_index", methods={"GET"})
     */
    public function index(EvenementsRepository $evenementsRepository): Response
    {
        return $this->render('evenements/index.html.twig', ['evenements' => $evenementsRepository->findAll()]);
    }

    /**
     * @Route("/new", name="evenements_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $evenement = new Evenements();
        $form = $this->createForm(EvenementsType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($evenement);
            $entityManager->flush();

            return $this->redirectToRoute('evenements_index');
        }

        return $this->render('evenements/new.html.twig', [
            'evenement' => $evenement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="evenements_show", methods={"GET"})
     */
    public function show(Evenements $evenement): Response
    {
        return $this->render('evenements/show.html.twig', ['evenement' => $evenement]);
    }

    /**
     * @Route("/{id}/edit", name="evenements_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Evenements $evenement): Response
    {
        $form = $this->createForm(EvenementsType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evenements_index', ['id' => $evenement->getId()]);
        }

        return $this->render('evenements/edit.html.twig', [
            'evenement' => $evenement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="evenements_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Evenements $evenement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evenement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($evenement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('evenements_index');
    }

    /**
     * @Route("/mailing/{id}", name="event_mailing_manager", methods={"GET","POST"})
     * @return Response
     */
    public function mailingManager(Request $request, int $id, \Swift_Mailer $mailer):Response
    {

        $form = $this->createForm(SendingMailType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $message = (new \Swift_Message('Questionnaire de satisfaction'))
                ->setFrom([	"cop.lab.wcs@gmail.com" => 'sender name'])
                ->setTo("cop.lab.wcs@gmail.com")
                ->setBody(
                    $this->renderView(
                        'evenements/mail.html.twig'
                    ),
                    'text/html'
                );
            if ($mailer->send($message)) {
                $this->addFlash(
                    'success',
                    "Emails envoyés avec succès !"
                );
            } else {
                $this->addFlash(
                    'danger',
                    "Les emails n'ont pas pu être envoyés !"
                );
            }
        }

        return $this->render('evenements/mailing.html.twig', [
            'form' => $form->createView(),
            'id' => $id,
        ]);
    }

    /**
     * @Route("/create_custom_form/{id}", name="create_custom_form", methods={"GET","POST"})
     * @return Response
     */
    public function createCustomForm(Request $request, int $id) :Response
    {
        $formulaire=new Formulaires();
        $form = $this->createForm(MailingType::class, $formulaire);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formulaire);
            $entityManager->flush();
            return $this->redirectToRoute('event_mailing_manager', ['id' => $id]);
        }
        return $this->render('evenements/createForm.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/formUser/{formulaires}", name="form_users", methods={"GET","POST"})
     */
    public function newForm(Request $request, Formulaires $formulaires): Response
    {
        $form = $this->createForm(MailingType::class, $formulaires);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('validateForm');
        }

        return $this->render('formUsers/formulaireUser.html.twig', [
            'formulaires' => $formulaires,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/formUser/validate", name="validate_user", methods={"GET"})
     */
    public function validateUser(): Response
    {
        return $this->render('formUsers/validateForm.html.twig');
    }
}
