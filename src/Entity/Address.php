<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Address
 * @package App\Entity
 *
 * @ORM\Entity(repositoryClass="App\Repository\AddressRepository")
 */
class Address
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @var int|null
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string|null
     */
    private $state;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string|null
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string|null
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string|null
     */
    private $addressLine1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string|null
     */
    private $addressLine2;

    /**
     * @ORM\Column(type="decimal", precision=11, scale=8, nullable=true)
     * @var float|null
     */
    private $longitude;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=8, nullable=true)
     * @var float|null
     */
    private $latitude;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param null|string $state
     * @return Address
     */
    public function setState(?string $state): Address
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @param null|string $postalCode
     * @return Address
     */
    public function setPostalCode(?string $postalCode): Address
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param null|string $city
     * @return Address
     */
    public function setCity(?string $city): Address
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    /**
     * @param null|string $addressLine1
     * @return Address
     */
    public function setAddressLine1(?string $addressLine1): Address
    {
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    /**
     * @param null|string $addressLine2
     * @return Address
     */
    public function setAddressLine2(?string $addressLine2): Address
    {
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * @param float|null $longitude
     * @return Address
     */
    public function setLongitude(?float $longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * @param float|null $latitude
     * @return Address
     */
    public function setLatitude(?float $latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getAddressLine1().' '.$this->getCity().' '.$this->getState().' '.$this->getPostalCode().' United States';
    }
}
