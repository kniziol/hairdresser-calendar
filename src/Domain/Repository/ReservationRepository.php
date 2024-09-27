<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Collection\ReservationIntervalsCollection;
use App\Domain\Converter\ReservationConverterInterface;
use App\Domain\Converter\ReservationIntervalConverterInterface;
use App\Domain\Model\Reservation;
use App\Infrastructure\Repository\ReservationRepository as DoctrineReservationRepository;

final class ReservationRepository implements ReservationRepositoryInterface
{
    /** @var DoctrineReservationRepository */
    private $doctrineRepository;

    /** @var ReservationConverterInterface */
    private $reservationConverter;

    /** @var ReservationIntervalConverterInterface */
    private $intervalConverter;

    public function __construct(
        DoctrineReservationRepository $doctrineRepository,
        ReservationIntervalConverterInterface $intervalConverter,
        ReservationConverterInterface $reservationConverter
    ) {
        $this->doctrineRepository = $doctrineRepository;
        $this->reservationConverter = $reservationConverter;
        $this->intervalConverter = $intervalConverter;
    }

    public function findAllByDate(\DateTimeInterface $date): ReservationIntervalsCollection
    {
        $result = new ReservationIntervalsCollection();
        $reservations = $this->doctrineRepository->findAllByDate($date);

        if (empty($reservations)) {
            return $result;
        }

        foreach ($reservations as $reservation) {
            $interval = $this->intervalConverter->fromReservationEntity($reservation);
            $result->addInterval($interval);
        }

        return $result;
    }

    public function save(Reservation $reservation): bool
    {
        try {
            $entity = $this->reservationConverter->toEntity($reservation);
            $this->doctrineRepository->save($entity);
        } catch (\Exception $exception) {
            return false;
        }

        return true;
    }
}
