<?php

namespace Dizda\CoineggerClientBundle\Client;

use GuzzleHttp\Client;
use Devster\GuzzleHttp\Subscriber\WsseAuth;
use GuzzleHttp\Exception\TransferException;
use Monolog\Logger;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;

/**
 * Class WSSEClient
 *
 * @author Jonathan Dizdarevic <dizda@dizda.fr>
 */
class WSSEClient
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var Logger
     */
    private $logger;

    /**
     * @param array  $config
     * @param string $appId
     * @param string $appSecret
     */
    public function __construct(array $config, $appId, $appSecret)
    {
        $this->client = new Client($config);

        // Add the WSSE Plugin to Guzzle
        (new WsseAuth($appId, $appSecret))->attach($this->client);
    }

    /**
     * @param string $url
     * @param array  $data
     *
     * @throws ServiceUnavailableHttpException
     *
     * @return mixed
     */
    public function post($url, $data)
    {
        try {
            $response = $this->client->post($url, [
                'json' => $data
            ]);
        } catch (TransferException $e) {
            // match all guzzle exceptions
            $this->logger->error($e->getMessage());

            // We return this exception to the controller
            throw new ServiceUnavailableHttpException(null, null, $e); // HTTP 503
        }

        return $response->json();
    }

    /**
     * @param Logger $logger
     */
    public function setLogger(Logger $logger)
    {
        $this->logger = $logger;
    }
}
