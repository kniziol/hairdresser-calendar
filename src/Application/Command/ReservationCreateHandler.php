<?php

declare(strict_types=1);

namespace App\Application\Command;

use App\Domain\Model\Chair;
use App\Domain\Model\Client;
use App\Domain\Model\Reservation;
use App\Domain\Repository\ReservationRepositoryInterface;
use DateTime;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class ReservationCreateHandler implements MessageHandlerInterface
{
    /** @var ReservationRepositoryInterface */
    private $reservationRepository;

    public function __construct(ReservationRepositoryInterface $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    public function __invoke(ReservationCreateCommand $command): void
    {
        $client = new Client($command->getFirstName(), $command->getLastName(), $command->getPhone());
        $chair = new Chair($command->getChair());

        $startDate = new DateTime($command->getStartDate());
        $endDate = new DateTime($command->getEndDate());

        $reservation = new Reservation(
            $client,
            $chair,
            $startDate,
            $endDate
        );

        $this->reservationRepository->save($reservation);
    }
}
