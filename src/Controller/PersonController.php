<?php

namespace App\Controller;

use App\Entity\Person;
use App\Entity\User;
use App\Form\PersonType;
use App\Repository\PersonRepository;
use chillerlan\QRCode\QRCode;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Knp\Snappy\Pdf;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/person")
 */
class PersonController extends AbstractController
{
//    /**
//     * @Route("/", name="person_index", methods={"GET"})
//     */
//    public function index(PersonRepository $personRepository): Response
//    {
//
//        $datas = [];
//     $persons = $personRepository->findAll();
//     foreach ($persons as $person) {
//
//        echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
//<div class="container justify-content-center"><div class="row justify-content-right"><div class="card" style="width: 18rem;">
//  <img class="card-img-top" src="'.(new QRCode)->render($person->getQrCode()).'" alt="Card image cap">
//  <div class="card-body">
//    <h5 class="card-title">'. $person->getFirstName() . $person->getLastName() . '</h5>
//    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
//    <a href="#" class="btn btn-primary">Go somewhere</a>
//  </div>
//  </div>
//  </div>
//</div>
//';
//    }
//
//        return $this->render('person/index.html.twig', ['people' => $personRepository->findAll()]);
//    }

    /**
     * @Route("/", name="person_index", methods={"GET"})
     */
    public function index(PersonRepository $personRepository): Response
    {
        $persons = $personRepository->findAll();
        $qrCodes = [];
        foreach($persons as $person) {
            $data = $person->getQrCode();
            $qrCodes[$person->getId()] = (new QRCode)->render($data);
        }
        return $this->render('person/index.html.twig', ['persons' => $persons, 'qrcodes' => $qrCodes]);
    }

    /**
     * @Route("/cards", name="person_cards", methods={"GET"})
     */
    public function indexCards(PersonRepository $personRepository): Response
    {
        $persons = $personRepository->findAll();
        $qrCodes = [];

        foreach($persons as $person) {
            $uuid=$person->getUser()->getUuid();
            $data = $person->getQrCode();
            $qrCodes[$person->getId()] = (new QRCode)->render($data);
        }

        return $this->render('person/indexCards.html.twig', ['persons' => $persons, 'qrcodes' => $qrCodes, 'uuid'=>$uuid]);
    }

    /**
     * @Route("/cards/export-pdf", name="pdf_export")
     * @param Pdf $knpSnappyPdf
     * @return PdfResponse
     */
    public function pdfAction(Pdf $knpSnappyPdf, PersonRepository $personRepository)
    {
        $persons = $personRepository->findAll();
        $qrCodes = [];

        foreach($persons as $person) {
            $uuid=$person->getUser()->getUuid();

            $data = $person->getQrCode();
            $qrCodes[$person->getId()] = (new QRCode)->render($data);
        }

        /* creating the pdf from html page */
        $html = $this->renderView('person/indexCards.html.twig', ['persons' => $persons, 'qrcodes' => $qrCodes, 'uuid'=>$uuid]);
        return new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html, ['user-style-sheet' => ['./assets/app.css',],]),
            'cards.pdf'
        );
    }

    /**
     * @Route("/new", name="person_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
//        $persons = $personRepository->findAll();
//        $ids = [];
//        foreach ($persons as $person){
//            $ids[] = $person->getId();
//        }
//
//        $newId = max($ids) + 1;
        $person = new Person();

        $user=new User();

        $form = $this->createForm(PersonType::class, $person);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $user->setUuid(rand(1000,9999));
            $person->setUser($user);
            $entityManager->persist($person);
            $entityManager->persist($user);
            $entityManager->flush();
            $entityManager = $this->getDoctrine()->getManager();
            $person->setQrCode('http://localhost:8000/person/'.$person->getId());
            $entityManager->persist($person);
            $entityManager->flush();
            return $this->redirectToRoute('person_index');
        }
        return $this->render('person/new.html.twig', [
            'person' => $person,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="person_show", methods={"GET"})
     */
    public function show(Person $person): Response
    {
        if($_GET){
            $this->addFlash(
                'success',
                'Votre code est bien envoyé'
            );
}

        return $this->render('person/show.html.twig', ['person' => $person]);
    }

    /**
     * @Route("/cards", name="cards_show", methods={"GET"})
     */
    public function showCard(PersonRepository $personRepository): Response
    {
//        $qrCode = new QRCodeGenerator();
//        $qrCode->generateQRCode();
//        var_dump($qrCode);
//        $qrCode = new QRCode();
        $data = 'https://www.youtube.com/watch?v=DLzxrzFCyOs&t=43s';

        echo '<div class="container justify-content-right"><img class="qrcode" src="'.(new QRCode)->render($data).'" /></div>';
        return $this->render('person/showCards.html.twig', ['persons' => $personRepository->findAll()]);
    }

    /**
     * @Route("/{id}/edit", name="person_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Person $person): Response
    {
        $form = $this->createForm(PersonType::class, $person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('person_index', ['id' => $person->getId()]);
        }

        return $this->render('person/edit.html.twig', [
            'person' => $person,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="person_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Person $person): Response
    {
        if ($this->isCsrfTokenValid('delete'.$person->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($person);
            $entityManager->flush();
        }

        return $this->redirectToRoute('person_index');
    }
}
