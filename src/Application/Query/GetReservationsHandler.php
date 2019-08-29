<?php

declare(strict_types=1);

namespace App\Application\Query;

use App\Domain\Collection\ReservationIntervalsCollection;
use App\Domain\Repository\ReservationRepositoryInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class GetReservationsHandler implements MessageHandlerInterface
{
    /** @var ReservationRepositoryInterface */
    private $repository;

    public function __construct(ReservationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(GetReservationsQuery $query): ReservationIntervalsCollection
    {
        return $this->repository->findAllByDate($query->getDate());
    }
}
