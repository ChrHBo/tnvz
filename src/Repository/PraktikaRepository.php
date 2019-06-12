<?php

namespace App\Repository;

use App\Entity\Praktika;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Praktika|null find($id, $lockMode = null, $lockVersion = null)
 * @method Praktika|null findOneBy(array $criteria, array $orderBy = null)
 * @method Praktika[]    findAll()
 * @method Praktika[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PraktikaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Praktika::class);
    }

    // /**
    //  * @return Praktika[] Returns an array of Praktika objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Praktika
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
