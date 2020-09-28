<?php

namespace App\Repository;

use App\Entity\HouseProperty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HouseProperty|null find($id, $lockMode = null, $lockVersion = null)
 * @method HouseProperty|null findOneBy(array $criteria, array $orderBy = null)
 * @method HouseProperty[]    findAll()
 * @method HouseProperty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HousePropertyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HouseProperty::class);
    }

    // /**
    //  * @return HouseProperty[] Returns an array of HouseProperty objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HouseProperty
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
