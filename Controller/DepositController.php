<?php

namespace Dizda\BitdepotClientBundle\Controller;

use Dizda\BitdepotClientBundle\BitdepotClientEvents;
use Dizda\BitdepotClientBundle\Event\CallbackEvent;
use Dizda\BitdepotClientBundle\Request\PostDepositExpectedRequest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

        $this->get('event_dispatcher')->dispatch(BitdepotClientEvents::DEPOSIT_CALLBACK, new CallbackEvent($callback));

        return JsonResponse::create([], Response::HTTP_OK);
    }
}
