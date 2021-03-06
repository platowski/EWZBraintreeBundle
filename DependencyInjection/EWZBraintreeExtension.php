<?php

namespace EWZ\Bundle\BraintreeBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class EWZBraintreeExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
        $loader->load('twig.xml');

        if (isset($config['environment'])) {
            $container->setParameter('ewz_braintree.environment', $config['environment']);
        }
        if (isset($config['merchant_id'])) {
            $container->setParameter('ewz_braintree.merchant_id', $config['merchant_id']);
        }
        if (isset($config['public_key'])) {
            $container->setParameter('ewz_braintree.public_key', $config['public_key']);
        }
        if (isset($config['private_key'])) {
            $container->setParameter('ewz_braintree.private_key', $config['private_key']);
        }
        if (isset($config['cse_key'])) {
            $container->setParameter('ewz_braintree.cse_key', $config['cse_key']);
        }
    }
}
