<?php
/*
 * This file is part of the BitdepotClientBundle package.
 *
 * (c) Jonathan Dizdarevic <https://github.com/dizda>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Dizda\BitdepotClientBundle;

/**
 * Class BitdepotClientEvents
 *
 * @author Jonathan Dizdarevic <dizda@dizda.fr>
 */
final class BitdepotClientEvents
{
    /**
     * When the Bitdepot wallet trigger a deposit
     */
    const DEPOSIT_CALLBACK = 'dizda_bitdepot_client.deposit_callback';

    /**
     * When the Bitdepot API trigger a withdraw
     */
    const WITHDRAW_OUTPUT_CALLBACK = 'dizda_bitdepot_client.withdraw_output_callback';
}
