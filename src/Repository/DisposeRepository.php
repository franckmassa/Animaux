<?php

namespace App\Repository;

use App\Entity\Dispose;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Dispose|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dispose|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dispose[]    findAll()
 * @method Dispose[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DisposeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dispose::class);
    }

    // /**
    //  * @return Dispose[] Returns an array of Dispose objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Dispose
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
