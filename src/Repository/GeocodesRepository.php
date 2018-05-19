<?php

namespace App\Repository;

use App\Entity\Geocodes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Geocodes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Geocodes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Geocodes[]    findAll()
 * @method Geocodes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeocodesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Geocodes::class);
    }

//    /**
//     * @return Geocodes[] Returns an array of Geocodes objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Geocodes
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
