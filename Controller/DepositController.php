<?php

namespace Dizda\BitdepotClientBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
    public function expectedAction()
    {
        return [];
    }
}
