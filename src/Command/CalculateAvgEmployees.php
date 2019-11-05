<?php
/**
 * Created by PhpStorm.
 * User: sfartdev5
 * Date: 05.11.2019
 * Time: 17:09
 */
declare(strict_types=1);

namespace App\Command;

use App\Entity\StoreLocation;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CalculateAvgEmployees
 * @package App\Command
 */
class CalculateAvgEmployees extends Command
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * CalculateAvgEmployees constructor.
     * @param EntityManagerInterface $em
     * @param string|null $name
     */
    public function __construct(EntityManagerInterface $em, string $name = null)
    {
        $this->em = $em;

        parent::__construct($name);
    }

    protected function configure()
    {
        $this
            ->setName('calculate:avg-employees')
            ->addArgument('location-ids', InputArgument::OPTIONAL, 'Enter location IDs separated by comma')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $ids = null;

        if ($argIds = $input->getArgument('location-ids')) {
            $ids = explode(',', $argIds);
        }

        /** @var StoreLocation[] $storeLocations */
        if ($ids) {
            $storeLocations = $this->em->getRepository(StoreLocation::class)->findBy(['id' => $ids]);
        } else {
            $storeLocations = $this->em->getRepository(StoreLocation::class)->findAll();
        }

        $totalEmployees = 0;

        foreach ($storeLocations as $location) {
            $totalEmployees += $location->getEmployees();
        }

        $awg = $totalEmployees / count($storeLocations);

        $output->writeln(ceil($awg));
    }
}
