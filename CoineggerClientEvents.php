<?php
/*
 * This file is part of the CoineggerClientBundle package.
 *
 * (c) Jonathan Dizdarevic <https://github.com/dizda>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Dizda\CoineggerClientBundle;

/**
 * Class CoineggerClientEvents
 *
 * @author Jonathan Dizdarevic <dizda@dizda.fr>
 */
final class CoineggerClientEvents
{
    /**
     * When the Coinegger wallet trigger a deposit
     */
    const DEPOSIT_CALLBACK = 'coinegger_client.deposit_callback';
}
