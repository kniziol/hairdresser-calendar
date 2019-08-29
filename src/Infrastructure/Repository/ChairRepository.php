<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Infrastructure\Entity\Chair;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method null|Chair find($id, $lockMode = null, $lockVersion = null)
 * @method null|Chair findOneBy(array $criteria, array $orderBy = null)
 * @method Chair[]    findAll()
 * @method Chair[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChairRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chair::class);
    }

    // /**
    //  * @return Chair[] Returns an array of Chair objects
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
    public function findOneBySomeField($value): ?Chair
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
