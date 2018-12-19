<?php

namespace App\Repository;

use App\Entity\StartUpRelation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StartUpRelation|null find($id, $lockMode = null, $lockVersion = null)
 * @method StartUpRelation|null findOneBy(array $criteria, array $orderBy = null)
 * @method StartUpRelation[]    findAll()
 * @method StartUpRelation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StartUpRelationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StartUpRelation::class);
    }

    // /**
    //  * @return StartUpRelation[] Returns an array of StartUpRelation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StartUpRelation
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
