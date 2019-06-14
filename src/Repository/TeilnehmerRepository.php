<?php

namespace App\Repository;

use App\Entity\Teilnehmer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Teilnehmer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Teilnehmer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Teilnehmer[]    findAll()
 * @method Teilnehmer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeilnehmerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Teilnehmer::class);
    }

    // /**
    //  * @return Teilnehmer[] Returns an array of Teilnehmer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function findAllWithSearch(?string $term)
    {
        $qb = $this->createQueryBuilder('m');
        if ($term) {
            $qb->andWhere('m.name LIKE :term OR m.vorname LIKE :term')
               ->setParameter('term', '%' . $term . '%')
            ;
        }
        return $qb
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?Teilnehmer
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
