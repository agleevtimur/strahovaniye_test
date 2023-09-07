<?php

namespace Factory;

use Entity\Car;
use Entity\SpecMachine;
use Entity\Truck;

interface TransportFactoryInterface
{
    function createCar(array $data): Car;

    function createTruck(array $data): Truck;

    function createSpecMachine(array $data): SpecMachine;
}