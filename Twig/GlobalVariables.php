<?php

namespace EWZ\Bundle\BraintreeBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

class GlobalVariables
{
    protected $container;

    /**
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return string
     */
    public function getCSEKey()
    {
        return $this->container->getParameter('ewz_braintree.cse_key');
    }
}
