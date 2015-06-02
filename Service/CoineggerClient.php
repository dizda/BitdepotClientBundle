<?php

namespace Dizda\CoineggerClientBundle\Service;

use Dizda\CoineggerClientBundle\Client\WSSEClient;

/**
 * Class CoineggerClient
 *
 * @author Jonathan Dizdarevic <dizda@dizda.fr>
 */
class CoineggerClient
{
    /**
     * @var WSSEClient
     */
    private $client;

    /**
     * @param string      $amountExpected
     * @param string|null $reference
     *
     * @return array
     */
    public function createDeposit($amountExpected, $reference = null)
    {
        $response = $this->client->post('deposits.json', [
            'type'            => 1,
            'amount_expected' => $amountExpected,
            'reference'       => $reference
        ]);

        return $response;
    }

    /**
     * Create a new withdraw request.
     *
     * @param $amount
     * @param $address
     * @param $reference
     *
     * @return mixed
     */
    public function withdraw($amount, $address, $reference)
    {
        $response = $this->client->post('withdraw/outputs', [
            'amount'     => $amount,
            'to_address' => $address,
            'reference'  => $reference
        ]);

        return $response;
    }

    /**
     * @param WSSEClient $wsseClient
     */
    public function setWSSEClient(WSSEClient $wsseClient)
    {
        $this->client = $wsseClient;
    }
}
