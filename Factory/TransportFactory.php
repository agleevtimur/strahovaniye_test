<?php

namespace Factory;

use DTO\TransportDTO;
use Entity\Car;
use Entity\SpecMachine;
use Entity\Truck;

class TransportFactory implements TransportFactoryInterface
{

    /**
     * @param TransportDTO[] $transportDTOList
     * @return array
     */
    public function createAllTransport(array $transportDTOList): array
    {
        $transportList = [];

        /** @var TransportDTO $dto */
        foreach ($transportDTOList as $transportDTO) {
            switch ($transportDTO->type) {
                case TRANSPORT_TYPE_CAR:
                    $transportList[] = $this->createCar($transportDTO);
                    break;
                case TRANSPORT_TYPE_TRUCK:
                    $transportList[] = $this->createTruck($transportDTO);
                    break;
                case TRANSPORT_TYPE_SPEC_MACHINE:
                    $transportList[] = $this->createSpecMachine($transportDTO);
            }
        }

        return $transportList;
    }

    public function createCar(TransportDTO $transportDTO): Car
    {
        return new Car($transportDTO->brand, $transportDTO->photoFileName, $transportDTO->carrying, $transportDTO->passengerSeatsCount);
    }

    public function createTruck(TransportDTO $transportDTO): Truck
    {
        $parameters = explode('x', $transportDTO->bodyWhl);

        return new Truck(
            $transportDTO->brand,
            $transportDTO->photoFileName,
            $transportDTO->carrying,
            (int) $parameters[0] ?? 0,
            (int) $parameters[1] ?? 0,
            (int) $parameters[2] ?? 0
        );
    }

    public function createSpecMachine(TransportDTO $transportDTO): SpecMachine
    {
        return new SpecMachine($transportDTO->brand, $transportDTO->photoFileName, $transportDTO->carrying, $transportDTO->extra);
    }
}
