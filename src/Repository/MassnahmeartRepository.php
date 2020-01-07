<?php

namespace App\Repository;

use App\Entity\Massnahmeart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
#use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Massnahmeart|null find($id, $lockMode = null, $lockVersion = null)
 * @method Massnahmeart|null findOneBy(array $criteria, array $orderBy = null)
 * @method Massnahmeart[]    findAll()
 * @method Massnahmeart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MassnahmeartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Massnahmeart::class);
    }

    // /**
    //  * @return Massnahmeart[] Returns an array of Massnahmeart objects
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
    public function findOneBySomeField($value): ?Massnahmeart
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
