<?php

namespace EWZ\Bundle\BraintreeBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Add "asbo" to global variables.
 */
class GlobalVariablesCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $container
            ->getDefinition('twig')
            ->addMethodCall('addGlobal', array('ewz_braintree', , new Reference('ewz_braintree.twig.global')))
        ;
    }
}
