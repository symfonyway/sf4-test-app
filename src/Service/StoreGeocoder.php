<?php
/**
 * Created by PhpStorm.
 * User: dmitrypliusnin
 * Date: 11/5/19
 * Time: 10:27 PM
 */

namespace App\Service;

use Geocoder\Model\AddressCollection;
use Geocoder\Provider\Nominatim\Nominatim;
use Geocoder\Query\GeocodeQuery;
use Http\Adapter\Guzzle6\Client;

/**
 * Class StoreGeocoder
 * @package App\Service
 */
class StoreGeocoder
{
    const USER_AGENTS = [
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36',
        'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36',
        'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0'
    ];
    /**
     * @param string $address
     * @return array
     */
    public function getCoordinatesByAddress(string $address)
    {
        $httpClient = new Client();
        $provider = Nominatim::withOpenStreetMapServer($httpClient, self::USER_AGENTS[rand(0, 3)]);

        /** @var AddressCollection $result */
        $result = $provider->geocodeQuery(GeocodeQuery::create($address));

        if ($location = $result->first()) {
            return $location->getCoordinates()->toArray();
        }

        return [null, null];
    }
}
