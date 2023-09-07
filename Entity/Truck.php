<?php

namespace Entity;

class Truck extends TransportBase
{
    protected static string $transportType = TRANSPORT_TYPE_TRUCK;
    public int $bodyWidth;
    public int $bodyHeight;
    public int $bodyLength;

    public function __construct(string $brand, string $photoFileName, $carrying, int $bodyWidth, int $bodyHeight, int $bodyLength)
    {
        parent::__construct($brand, $photoFileName, $carrying);
        $this->bodyWidth = $bodyWidth;
        $this->bodyHeight = $bodyHeight;
        $this->bodyLength = $bodyLength;
    }

    public function getBodyVolume(): float
    {
        return $this->bodyWidth * $this->bodyLength * $this->bodyHeight;
    }

    public function __toString(): string
    {
        return $this->toString("", (string) $this->getBodyVolume(), "");
    }
}