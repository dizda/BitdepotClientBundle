<?php

namespace Dizda\BitdepotClientBundle\Request;

use Dizda\BitdepotClientBundle\Request\AbstractRequest;
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

        $resolver->setAllowedTypes('id', 'integer');
        $resolver->setAllowedTypes('amount', 'string');
        $resolver->setAllowedTypes('to_address', 'string');
        $resolver->setAllowedTypes('withdraw', 'array');
        $resolver->setAllowedTypes('reference', 'string');
    }
}
