<?php
/**
 * Created by PhpStorm.
 * User: dmitrypliusnin
 * Date: 11/5/19
 * Time: 10:32 PM
 */

namespace App\EventSubscriber;


use App\Entity\StoreLocation;
use App\Service\StoreGeocoder;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class StoreLocationSubscriber implements EventSubscriberInterface
{
    /**
     * @var StoreGeocoder
     */
    private $storeGeocoder;

    /**
     * StoreLocationSubscriber constructor.
     * @param StoreGeocoder $storeGeocoder
     */
    public function __construct(StoreGeocoder $storeGeocoder)
    {
        $this->storeGeocoder = $storeGeocoder;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            EasyAdminEvents::PRE_UPDATE => ['updateAddressCoordinates'],
            EasyAdminEvents::PRE_PERSIST => ['updateAddressCoordinates']
        ];
    }

    /**
     * @param GenericEvent $event
     */
    public function updateAddressCoordinates(GenericEvent $event)
    {
        $entity = $event->getSubject();

        if (!($entity instanceof StoreLocation)) {
            return;
        }

        $coords = $this->storeGeocoder->getCoordinatesByAddress((string) $entity->getAddress());
        $entity->getAddress()->setLongitude($coords[0]);
        $entity->getAddress()->setLatitude($coords[1]);
        $event['entity'] = $entity;
    }
}
