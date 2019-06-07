<?php

namespace App\Repository;

use App\Entity\Eintragung;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Eintragung|null find($id, $lockMode = null, $lockVersion = null)
 * @method Eintragung|null findOneBy(array $criteria, array $orderBy = null)
 * @method Eintragung[]    findAll()
 * @method Eintragung[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EintragungRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Eintragung::class);
    }

    // /**
    //  * @return Eintragung[] Returns an array of Eintragung objects
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
    public function findOneBySomeField($value): ?Eintragung
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
