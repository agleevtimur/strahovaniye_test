<?php

namespace Factory;

abstract class TransportFileFactoryBase implements TransportFactoryInterface
{
    protected string $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    abstract public function createAllTransport(): array;
}