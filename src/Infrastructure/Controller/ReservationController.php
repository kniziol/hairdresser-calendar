<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller;

use App\Application\Query\GetReservationsQuery;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

class ReservationController extends AbstractFOSRestController
{
    use HandleTrait;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function getReservations(MessageBusInterface $bus, string $date)
    {
        $dateTime = new \DateTime($date);
        $reservations = $this->handle(new GetReservationsQuery($dateTime));

        return View::create($reservations);
    }
}
