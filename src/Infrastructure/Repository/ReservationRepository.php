<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Common\DateFormat;
use App\Infrastructure\Entity\Reservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method null|Reservation find($id, $lockMode = null, $lockVersion = null)
 * @method null|Reservation findOneBy(array $criteria, array $orderBy = null)
 * @method Reservation[]    findAll()
 * @method Reservation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reservation::class);
    }

    public function findAllByDate(\DateTimeInterface $date): array
    {
        $dateFromFormatted = $date->format(DateFormat::DATE_ONLY);

        $dateTo = new \DateTime($dateFromFormatted);
        $dateTo->add(new \DateInterval('P1D'));
        $dateToFormatted = $dateTo->format(DateFormat::DATE_ONLY);

        return $this
            ->createQueryBuilder('r')
            ->andWhere('r.startDate >= :dateFrom')
            ->andWhere('r.startDate < :dateTo')
            ->setParameters([
                'dateFrom' => $dateFromFormatted,
                'dateTo'   => $dateToFormatted,
            ])
            ->getQuery()
            ->execute()
            ;
    }

    public function save(Reservation $reservation): void
    {
        $this->getEntityManager()->flush($reservation);
    }

    // /**
    //  * @return Reservation[] Returns an array of Reservation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reservation
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
