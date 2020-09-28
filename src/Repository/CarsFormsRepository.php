<?php

namespace App\Repository;

use App\Entity\CarsForms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CarsForms|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarsForms|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarsForms[]    findAll()
 * @method CarsForms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarsFormsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarsForms::class);
    }

    // /**
    //  * @return CarsForms[] Returns an array of CarsForms objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CarsForms
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
