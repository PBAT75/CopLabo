<?php

namespace App\Controller;

use App\Repository\ChampsSoumisRepository;
use App\Repository\EvenementsRepository;
use App\Repository\StartUpRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatisticsController extends AbstractController
{
    /**
     * @Route("/statistics", name="statistics")
     */
    public function index(ChampsSoumisRepository $csr, StartUpRepository $sr):Response
    {
        $cs=$csr->findAll();
        $s=$sr->findAll();
        $satisfaction=[];
        foreach ($cs as $key=>$value) {
            $id=$value->getStartup()->getName();
            $satisfaction[$id][]=$value->getSatisfaction();
        }
        $avg=[];
        foreach ($satisfaction as $key => $value) {
            $sum=0;
            foreach ($value as $key2=>$value2) {
                $sum+=$value2;
            }
            $avg[$key]=$sum/count($value);
        }
        return $this->render('statistics/index.html.twig', [
            'avg'=>$avg,
        ]);
    }
}