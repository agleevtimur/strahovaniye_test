<?php

namespace Factory;

use Entity\Car;
use Entity\SpecMachine;
use Entity\TransportBase;
use Entity\Truck;

class TransportCSVFileFactory extends TransportFileFactoryBase
{

    /**
     * @return TransportBase[]
     */
    public function createAllTransport(): array
    {
        $transportList = [];

        if (($fp = fopen($this->fileName, "r")) !== FALSE) {
            while (($data = fgetcsv($fp, 10000, ";")) !== FALSE) {
                if (count($data) > 6 && $data[1] !== "" && $data[3] !== "" && $data[5] !== "") {
                    $transport = $this->createFromType($data);

                    if ($transport !== null) {
                        $transportList[] = $transport;
                    }
                }
            }

            fclose($fp);
        }

        return $transportList;
    }

    public function createCar(array $data): Car
    {
        return new Car($data[1], $data[3], (float)$data[5], (int)$data[2]);
    }

    public function createTruck(array $data): Truck
    {
        $parameters = explode('x', $data[4]);
        if ($parameters === [""]) {
            return new Truck($data[1], $data[3], (float)$data[5], 0, 0, 0);
        }

        return new Truck($data[1], $data[3], (float)$data[5], $parameters[0], $parameters[1], $parameters[2]);
    }

    public function createSpecMachine(array $data): SpecMachine
    {
        return new SpecMachine($data[1], $data[3], (float)$data[5], $data[6]);
    }

    private function createFromType(array $data): ?TransportBase
    {
//        var_dump($data[0]);
        switch ($data[0]) {
            case TRANSPORT_TYPE_CAR:
                return $this->createCar($data);
            case TRANSPORT_TYPE_TRUCK:
                return $this->createTruck($data);
            case TRANSPORT_TYPE_SPEC_MACHINE:
                return $this->createSpecMachine($data);
        }

        return null;
    }
}