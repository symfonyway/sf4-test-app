<?php

namespace App\Repository;

use App\Entity\StoreLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method StoreLocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method StoreLocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method StoreLocation[]    findAll()
 * @method StoreLocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StoreLocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StoreLocation::class);
    }
}
