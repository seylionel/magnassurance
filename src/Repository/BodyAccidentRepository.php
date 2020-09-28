<?php

namespace App\Repository;

use App\Entity\BodyAccident;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BodyAccident|null find($id, $lockMode = null, $lockVersion = null)
 * @method BodyAccident|null findOneBy(array $criteria, array $orderBy = null)
 * @method BodyAccident[]    findAll()
 * @method BodyAccident[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BodyAccidentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BodyAccident::class);
    }

    // /**
    //  * @return BodyAccident[] Returns an array of BodyAccident objects
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
    public function findOneBySomeField($value): ?BodyAccident
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
