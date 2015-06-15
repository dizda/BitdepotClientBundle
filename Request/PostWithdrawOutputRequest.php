<?php

namespace Dizda\CoineggerClientBundle\Request;

use Dizda\CoineggerClientBundle\Request\AbstractRequest;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PostWithdrawOutputRequest
 *
 * @author Jonathan Dizdarevic <dizda@dizda.fr>
 */
class PostWithdrawOutputRequest extends AbstractRequest
{
    /**
     * {@inheritdoc}
     */
    public function __construct(array $options = array())
    {
        parent::__construct($options);
    }

    /**
     * {@inheritdoc}
     */
    protected function setDefaultOptions(OptionsResolver $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setRequired(array(
            'amount',
            'to_address',
            'withdraw',
            'reference'
        ));

        $resolver->setDefined(array(
            'id'
        ));

        $resolver->setAllowedTypes(array(
            'id'         => ['integer'],
            'amount'     => ['string'],
            'to_address' => ['string'],
            'withdraw'   => ['array'],
            'reference'  => ['string']
        ));
    }
}
