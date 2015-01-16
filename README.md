CoineggerClientBundle - Work In Progress
========================

When bitcoin meet Arnold Schwarzenegger.

See the [API Project](https://github.com/dizda/coinegger).

## Setup

Install with Composer

    composer require dizda/coinegger-client-bundle

## Configuration

To active hooks, you must update your `routing.yml`:

    dizda_coinegger_client:
        resource: "@DizdaCoineggerClientBundle/Resources/config/routing.yml"
        prefix:   /callback # don't forget to restrict the path you specify in your security.yml


Add this to your `config.yml`:

    dizda_coinegger_client:
        base_url:   %coinegger_endpoint%    # Correspond to the coinegger api server
        app_id:     %coinegger_app_id%
        app_secret: %coinegger_app_secret%

## Listeners

You probably want to listening all interactions that are made on/by your addresses? It's simple.

### DepositListener

An event `dizda_coinegger_client.deposit_callback` is dispatched everytime a deposit is made (and reached confirmations you specified).

So, for example, you could create a listener:

```php
<?php
// AdvertisingBundle/EventListener/DepositListener.php

namespace Dizda\Bundle\AdvertisingBundle\EventListener;

use Dizda\CoineggerClientBundle\Event\CallbackEvent;

/**
 * Class DepositListener
 */
class DepositListener
{
    /**
     * When a deposit is made, the listener will trigger this hook
     *
     * @param CallbackEvent $event
     */
    public function onDepositCallback(CallbackEvent $event)
    {
        $data = $event->getData();

        if ($data['is_fulfilled'] === false) {
            // The case when the deposit were not sufficient
            return;
        }

        if ($data['is_overfilled'] === true) {
            $this->logger->warning('The deposit has been overfilled.', [ $data['id'] ]);
        }

        // The deposit was notified to be successful, so you can do your stuff there
        $advertiser = $this->em
            ->getRepository('DizdaAdvertisingBundlee:Advertiser')
            ->findOneByDepositAddress($data['address_external']['value'])
        ;

        // Activate the campaign
        $advertiser->activate();

        // [...]
    }
}
```

And add the listener to `services.xml`:

```xml
<service id="dizda_advertising.listener.deposit" class="Dizda\Bundle\AdvertisingBundle\EventListener\DepositListener">
    <tag name="kernel.event_listener" event="dizda_coinegger_client.deposit_callback" method="onDepositCallback" />
</service>
```

That's it!

## License

MIT Licensed, see LICENSE.

