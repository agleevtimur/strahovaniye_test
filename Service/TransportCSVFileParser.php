<?php

namespace Service;

use DTO\TransportDTO;

class TransportCSVFileParser
{
    /**
     * @param string $csvFile
     * @return TransportDTO[]
     */
    public function parse(string $csvFile): array
    {
        $dtoList = [];
        if (($fp = fopen($csvFile, "r")) !== FALSE) {
            while (($data = fgetcsv($fp, 10000, ";")) !== FALSE) {
                if (!isset($data[6])) {
                    continue;
                }

                $dto = new TransportDTO();
                $dto->type = $data[0];
                $dto->brand = $data[1];
                $dto->passengerSeatsCount = (int) $data[2];
                $dto->photoFileName = $data[3];
                $dto->carrying = (float) $data[5];
                $dto->bodyWhl = $data[4];
                $dto->extra = $data[6];

                $dtoList[] = $dto;
            }

            fclose($fp);
        }

        return $dtoList;
    }
}
