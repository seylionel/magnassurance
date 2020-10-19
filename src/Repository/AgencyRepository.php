<?php

namespace App\Repository;

use App\Entity\Agency;
use App\Entity\City;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use function Doctrine\ORM\QueryBuilder;

/**
 * @method Agency|null find($id, $lockMode = null, $lockVersion = null)
 * @method Agency|null findOneBy(array $criteria, array $orderBy = null)
 * @method Agency[]    findAll()
 * @method Agency[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgencyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Agency::class);
    }

    // /**
    //  * @return Agency[] Returns an array of Agency objects
    //  */
    public function findAllWithCreditsInCity(City $city)
    {
        $qb = $this->createQueryBuilder('agency');

        return $qb
            ->join('agency.user', 'user')
            ->join('agency.city', 'city')
            ->leftJoin('agency.cities', 'cities')
            ->where($qb->expr()->gt('user.credit', 0))
            ->andWhere('city.id = :city_id OR cities.id = :cities_id')
            ->setParameter('city_id', $city->getId())
            ->setParameter('cities_id', $city->getId())
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Agency
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
