<?php

namespace App\Repository;

use App\Entity\Massnahme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
#use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Massnahme|null find($id, $lockMode = null, $lockVersion = null)
 * @method Massnahme|null findOneBy(array $criteria, array $orderBy = null)
 * @method Massnahme[]    findAll()
 * @method Massnahme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MassnahmeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Massnahme::class);
    }

    // /**
    //  * @return Massnahme[] Returns an array of Massnahme objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Massnahme
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
