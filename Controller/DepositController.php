<?php

namespace Dizda\BitdepotClientBundle\Controller;

use Dizda\CoineggerClientBundle\CoineggerClientEvents;
use Dizda\CoineggerClientBundle\Event\CallbackEvent;
use Dizda\CoineggerClientBundle\Request\PostDepositExpectedRequest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Class DepositController
 *
 * @author Jonathan Dizdarevic <dizda@dizda.fr>
 *
 * @Route("/deposit")
 */
class DepositController extends Controller
{
    /**
     * @Route("/expected.json")
     * @Method("POST")
     */
    public function expectedAction(Request $request)
    {
        $callback = (new PostDepositExpectedRequest($request->request->all()))->getAttributes();

        $this->get('event_dispatcher')->dispatch(CoineggerClientEvents::DEPOSIT_CALLBACK, new CallbackEvent($callback));

        return [];
    }
}
