<?php

namespace App\Repository;

use App\Entity\styles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method styles|null find($id, $lockMode = null, $lockVersion = null)
 * @method styles|null findOneBy(array $criteria, array $orderBy = null)
 * @method styles[]    findAll()
 * @method styles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StylesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, styles::class);
    }

//    /**
//     * @return styles[] Returns an array of styles objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?styles
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
