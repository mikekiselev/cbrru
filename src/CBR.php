<?php
/**
 * Created by PhpStorm.
 * User: oem
 * Date: 04.12.18
 * Time: 22:53
 */

namespace mikekiselev;

use GuzzleHttp\Client;

class CBR
{

    const DAILY = 'http://www.cbr.ru/scripts/XML_daily.asp';

    /**
     * @param \DateTime|NULL $dt
     * @return array
     * @throws \Exception
     */
    public static function getDaily(\DateTime $dt = NULL):array
    {

        if(is_null($dt)) {
            $dt = new \DateTime('now');
        }
        $params = [
            'date_req' => $dt->format('d/m/Y')
        ];
        return self::getData( self::DAILY, $params );
    }

    /**
     * @param string $url
     * @param array $params
     * @return array
     */
    private static function getData(string $url, array $params): array
    {
        $data = [];

        $client = new Client();
        try {

            $xml = $client->request('GET', $url, $params)->getBody();

            $json = json_encode($xml);
            $data = json_decode($json, true);
        } catch (Exception $e) {
            $data = ['error' => $e->getMessage()];
        }

        return $data;
    }
}