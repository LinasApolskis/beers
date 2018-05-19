<?php

namespace App\Repository;

use App\Entity\breweries;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method breweries|null find($id, $lockMode = null, $lockVersion = null)
 * @method breweries|null findOneBy(array $criteria, array $orderBy = null)
 * @method breweries[]    findAll()
 * @method breweries[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BreweriesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, breweries::class);
    }

//    /**
//     * @return breweries[] Returns an array of breweries objects
//     */
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
    public function findOneBySomeField($value): ?breweries
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
