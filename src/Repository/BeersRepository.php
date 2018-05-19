<?php

namespace App\Repository;

use App\Entity\Beers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Beers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Beers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Beers[]    findAll()
 * @method Beers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BeersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Beers::class);
    }

//    /**
//     * @return Beers[] Returns an array of Beers objects
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
    public function findOneBySomeField($value): ?Beers
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
