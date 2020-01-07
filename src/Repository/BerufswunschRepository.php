<?php

namespace App\Repository;

use App\Entity\Berufswunsch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
#use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Berufswunsch|null find($id, $lockMode = null, $lockVersion = null)
 * @method Berufswunsch|null findOneBy(array $criteria, array $orderBy = null)
 * @method Berufswunsch[]    findAll()
 * @method Berufswunsch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BerufswunschRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Berufswunsch::class);
    }

    // /**
    //  * @return Berufswunsch[] Returns an array of Berufswunsch objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Berufswunsch
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
