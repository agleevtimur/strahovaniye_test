<?php

namespace tests;

use DTO\TransportDTO;
use Factory\TransportFactory;
use PHPUnit\Framework\TestCase;

class TransportFactoryTest extends TestCase
{
    /**
     * @dataProvider createTruckBodyVolumeProvider
     */
    public function testCreateTruckBodyVolume(array $data, float $expected)
    {
        $dto = new TransportDTO();
        $dto->type = $data[0];
        $dto->brand = $data[1];
        $dto->photoFileName = $data[2];
        $dto->bodyWhl = $data[3];
        $dto->carrying = $data[4];

        $truck = (new TransportFactory())->createTruck($dto);

        $this->assertSame($expected, $truck->getBodyVolume());
    }

    public function createTruckBodyVolumeProvider(): array
    {
        return [
          [
              ['truck', 'ford', '', 'f1.png', '1.1', '3x5x0'], 0.0
          ]
        ];
    }
}