<?php

namespace Dizda\CoineggerClientBundle\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AbstractRequest
 *
 * @author Jonathan Dizdarevic <dizda@dizda.fr>
 */
abstract class AbstractRequest
{
    private $attributes;

    /**
     * @param array $options
     */
    public function __construct(array $options = array())
    {
        $resolver = new OptionsResolver();
        $this->setDefaultOptions($resolver);

        $this->attributes = $resolver->resolve($options);
    }

    /**
     * @param OptionsResolver $resolver
     */
    protected function setDefaultOptions(OptionsResolver $resolver)
    {

    }

    public function getAttributes()
    {
        return $this->attributes;
    }
}
