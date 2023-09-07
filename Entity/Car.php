<?php

namespace Entity;

class Car extends TransportBase
{
    protected static string $transportType = TRANSPORT_TYPE_CAR;
    private int $passengerSeatsCount;


    public function __construct(string $brand, string $photoFileName, float $carrying, int $passengerSeatsCount)
    {
        parent::__construct($brand, $photoFileName, $carrying);
        $this -> passengerSeatsCount = $passengerSeatsCount;
    }

    public function getPassengerSeatsCount(): int {
        return $this->passengerSeatsCount;
    }

    public function __toString()
    {
        return $this->toString((string)$this->passengerSeatsCount, "", "");
    }
}