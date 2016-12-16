<?php

namespace Dizda\BitdepotClientBundle\Controller;

use Dizda\BitdepotClientBundle\BitdepotClientEvents;
use Dizda\BitdepotClientBundle\Event\CallbackEvent;
use Dizda\BitdepotClientBundle\Request\PostWithdrawOutputRequest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

        $this->get('event_dispatcher')->dispatch(BitdepotClientEvents::WITHDRAW_OUTPUT_CALLBACK, new CallbackEvent($callback));

        return JsonResponse::create([], Response::HTTP_OK);
    }
}
