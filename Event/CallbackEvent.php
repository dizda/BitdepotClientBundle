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
    private $callback;

    /**
     * @param array $callback
     */
    public function __construct(array $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return array
     */
    public function getCallback()
    {
        return $this->callback;
    }
}
