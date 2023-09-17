<?php

namespace Factory;

use DTO\TransportDTO;
use Entity\Car;
use Entity\SpecMachine;
use Entity\Truck;

interface TransportFactoryInterface
{
    function createCar(TransportDTO $transportDTO): Car;

    function createTruck(TransportDTO $transportDTO): Truck;

    function createSpecMachine(TransportDTO $transportDTO): SpecMachine;
}
