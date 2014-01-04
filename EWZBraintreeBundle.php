<?php

namespace EWZ\Bundle\BraintreeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use EWZ\Bundle\BraintreeBundle\DependencyInjection\Compiler\GlobalVariablesCompilerPass;

class EWZBraintreeBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new GlobalVariablesCompilerPass());
    }
}
