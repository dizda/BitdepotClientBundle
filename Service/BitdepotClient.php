<?php

namespace Dizda\BitdepotClientBundle\Service;

use Dizda\BitdepotClientBundle\Client\WSSEClient;

/**
 * Class BitdepotClient
 *
 * @author Jonathan Dizdarevic <dizda@dizda.fr>
 */
class BitdepotClient
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
            'amount_expected' => (string) $amountExpected,
            'reference'       => (string) $reference
        ]);

        return $response;
    }

    /**
     * @param string      $amountExpected
     * @param string      $currency
     * @param string|null $reference
     *
     * @return array
     */
    public function createFiatDeposit($amountExpected, $currency, $reference = null)
    {
        $response = $this->client->post('deposits.json', [
            'type'            => 1,
            'amount_expected_fiat' => [
                'amount'   => (string) $amountExpected,
                'currency' => (string) $currency
            ],
            'reference'       => (string) $reference
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
            'amount'     => (string) $amount,
            'to_address' => (string) $address,
            'reference'  => (string) $reference
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
