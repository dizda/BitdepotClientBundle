<?php

namespace Dizda\BitdepotClientBundle\Request;

use Dizda\BitdepotClientBundle\Request\AbstractRequest;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PostDepositExpectedRequest
 *
 * @author Jonathan Dizdarevic <dizda@dizda.fr>
 */
class PostDepositExpectedRequest extends AbstractRequest
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
            'id',
            'amount_expected',
            'amount_filled',
            'is_fulfilled',
            'is_overfilled',
            'reference'
        ));

        $resolver->setDefined(array(
            'address_external'
        ));

        $resolver->setAllowedTypes('id', 'integer');
        $resolver->setAllowedTypes('amount_expected', 'string');
        $resolver->setAllowedTypes('amount_filled', 'string');
        $resolver->setAllowedTypes('is_fulfilled', 'bool');
        $resolver->setAllowedTypes('is_overfilled', 'bool');
        $resolver->setAllowedTypes('address_external', 'array');
        $resolver->setAllowedTypes('reference', 'string');
    }
}
