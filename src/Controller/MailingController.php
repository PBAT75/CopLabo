<?php

namespace App\Controller;

use App\Form\SendingMailType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MailingController extends AbstractController
{
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
                        'evenements/mail.html.twig', [
                            'id' => $id,

                        ]
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
            'id' => $id,
            'form' => $form->createView(),
        ]);
    }
}
