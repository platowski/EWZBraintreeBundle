<?php

namespace EWZ\Bundle\BraintreeBundle\Factory;

use EWZ\Bundle\BraintreeBundle\Exception\InvalidServiceException;
use Braintree_Configuration;

/**
 * Factory for creating Braintree services
 */
class BraintreeFactory
{
    /**
     * Constructor with Braintree configuration.
     *
     * @param string $environment
     * @param string $merchantId
     * @param string $publicKey
     * @param string $privateKey
     */
    public function __construct($environment, $merchantId, $publicKey, $privateKey)
    {
        Braintree_Configuration::environment($environment);
        Braintree_Configuration::merchantId($merchantId);
        Braintree_Configuration::publicKey($publicKey);
        Braintree_Configuration::privateKey($privateKey);
    }

    /**
     * Factory method for creating and getting Braintree services.
     *
     * @param string $serviceName Braintree service name
     * @param array  $attributes  Attribures for braintree service creation
     *
     * @return mixed
     */
    public function get($serviceName, array $attributes = array())
    {
        $className = sprintf('Braintree_%s', ucfirst($serviceName));

        if (class_exists($className) && method_exists($className, 'factory')) {
            return $className::factory($attributes);
        }

        throw new InvalidServiceException(sprintf('Invalid service %s', $serviceName));
    }
}
