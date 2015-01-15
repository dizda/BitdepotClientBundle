<?php

namespace Dizda\CoineggerClientBundle\Request;

use Dizda\CoineggerClientBundle\Request\AbstractRequest;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PostDepositExpectedRequest
 *
 * @author Jonathan Dizdarevic <dizda@dizda.fr>
 */
class PostDepositExpectedRequest extends AbstractRequest
{

    public function __construct(array $options = array())
    {
        parent::__construct($options);
    }

    protected function setDefaultOptions(OptionsResolver $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setRequired(array(
            'id',
            'amount_expected',
            'amount_filled',
            'is_fulfilled',
            'is_overfilled',
        ));

        $resolver->setDefined(array(
            'address_external'
        ));

        $resolver->setAllowedTypes(array(
            'id'               => ['integer'],
            'amount_expected'  => ['string'],
            'amount_filled'    => ['string'],
            'is_fulfilled'     => ['bool'],
            'is_overfilled'    => ['bool'],
            'address_external' => ['array']
        ));
    }
}
