<?php

namespace Dizda\CoineggerClientBundle\Event;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class CallbackEvent
 */
class CallbackEvent extends Event
{
    /**
     * @var array
     */
    private $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
}
