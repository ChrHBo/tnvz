<?php

namespace App\Repository;

use App\Entity\Funktion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Funktion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Funktion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Funktion[]    findAll()
 * @method Funktion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FunktionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Funktion::class);
    }

    // /**
    //  * @return Funktion[] Returns an array of Funktion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Funktion
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
