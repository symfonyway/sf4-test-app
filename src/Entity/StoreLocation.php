<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class StoreLocation
 * @package App\Entity
 *
 * @ORM\Entity(repositoryClass="App\Repository\StoreLocationRepository")
 */
class StoreLocation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @var int|null
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Address", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @var Address
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $employees;

    public function __construct()
    {
        $this->address = new Address();
        $this->employees = 0;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return StoreLocation
     */
    public function setAddress(Address $address): StoreLocation
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return int
     */
    public function getEmployees(): int
    {
        return $this->employees;
    }

    /**
     * @param int $employees
     * @return StoreLocation
     */
    public function setEmployees(int $employees): StoreLocation
    {
        $this->employees = $employees;

        return $this;
    }
}
