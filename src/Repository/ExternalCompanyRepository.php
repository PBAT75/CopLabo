<?php

namespace App\Repository;

use App\Entity\ExternalCompany;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ExternalCompany|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExternalCompany|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExternalCompany[]    findAll()
 * @method ExternalCompany[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExternalCompanyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ExternalCompany::class);
    }

    // /**
    //  * @return ExternalCompany[] Returns an array of ExternalCompany objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExternalCompany
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
