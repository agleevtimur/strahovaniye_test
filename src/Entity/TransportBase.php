<?php

namespace Entity;

abstract class TransportBase
{
    private string $brand;
    private string $photoFileName;
    private float $carrying;
    protected static string $transportType;

    public function __construct(string $brand, string $photoFileName, float $carrying)
    {
        $this -> brand = $brand;
        $this -> photoFileName = $photoFileName;
        $this -> carrying = $carrying;
    }

    public function getPhotoFileNameExtension(): string
    {
        $temp = explode('.', $this->photoFileName);

        return array_pop($temp);
    }

    public static function getType(): string
    {
        return self::$transportType;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getPhotoFileName(): string
    {
        return $this->photoFileName;
    }

    public function getCarrying(): float
    {
        return $this->carrying;
    }

    /**
     * Используется только для иллюстрации результата работы тестового проекта.
     * В энтерпрайз проектах реализовывать сервис для изображения данных классов в вебе
     * @param string $passCount
     * @param string $bodyVolume
     * @param string $extra
     * @return string
     */
    protected function toString(string $passCount, string $bodyVolume, string $extra): string
    {
        return sprintf(
            "Тип: %s Бренд: %s Кол-во пасс мест: %s Имя файла: %s Кол-во грузо мест: %s Объем машины: %s Доп: %s",
            static::$transportType,
            $this->getBrand(),
            $passCount,
            $this->getPhotoFileName(),
            $this->getCarrying(),
            $bodyVolume,
            $extra
        );
    }
}
