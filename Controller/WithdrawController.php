<?php

namespace Dizda\CoineggerClientBundle\Controller;

use Dizda\CoineggerClientBundle\CoineggerClientEvents;
use Dizda\CoineggerClientBundle\Event\CallbackEvent;
use Dizda\CoineggerClientBundle\Request\PostWithdrawOutputRequest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class WithdrawController
 *
 * @author Jonathan Dizdarevic <dizda@dizda.fr>
 *
 * @Route("/withdraw")
 */
class WithdrawController extends Controller
{
    /**
     * @Route("/output.json")
     * @Method("POST")
     */
    public function outputAction(Request $request)
    {
        $callback = (new PostWithdrawOutputRequest($request->request->all()))->getAttributes();

        $this->get('event_dispatcher')->dispatch(CoineggerClientEvents::WITHDRAW_OUTPUT_CALLBACK, new CallbackEvent($callback));

        return [];
    }
}
