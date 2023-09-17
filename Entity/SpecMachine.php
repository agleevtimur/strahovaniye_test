<?php

namespace Entity;

class SpecMachine extends TransportBase
{
    /**
     * Доп описание транспорта
     * @var string
     */
    private string $extra;
    protected static string $transportType = TRANSPORT_TYPE_SPEC_MACHINE;
    public function __construct(string $brand, string $photoFileName, float $carrying, string $extra)
    {
        parent::__construct($brand, $photoFileName, $carrying);
        $this -> extra = $extra;
    }

    public function getExtra(): string
    {
        return $this->extra;
    }

    public function __toString()
    {
        return $this->toString("", "", $this->extra);
    }
}