EWZBraintreeBundle
==================

This bundle integrate Braintree's PHP client library into Symfony.

Installation
------------

### Composer ###

Just add to your composer.json file:

```json
{
    "require": {
        "excelwebzone/braintree-bundle": "dev-master"
    }
}
```

### Application Kernel ###

Add the bundle to your application's kernel:

```php
// app/AppKernel.php

public function registerBundles()
{
    return array(
        // ...
        new EWZ\Bundle\BraintreeBundle\EWZBraintreeBundle(),
        // ...
    );
}
```


Configuration
-------------

```yml
# app/config/config.yml
# ...
ewz_braintree:
  environment: sandbox
  merchant_id: your_merchant_id
  public_key:  your_public_key
  private_key: your_private_key
```

For more info about the configuration variables see [Braintree docs](https://www.braintreepayments.com/docs/php/guide/getting_paid#configuration)

Usage
-----

Braintree php client library comes with a bunch of services for the Braintree API. They are usually prefixed by `Braintree_`.
To see all available Braintree services head over to [braintree_php](https://github.com/braintree/braintree_php) or the [official documentation](https://www.braintreepayments.com/docs/php).


### Factory ###

One of the methods for getting a desired service is to call the `get` method from the `BraintreeFactory`:

```php
// in your controller
$factory = $this->get('ewz_braintree.factory');
$customerService = $factory->get('customer');
```

### Defining a service ###

Instead of calling the factory you can define a custom service in your own bundle:

```yml
# ../services.yml
services:
    customer_custom_service:
        class:            Braintree_Customer
        factory_service:  ewz_braintree.factory
        factory_method:   get
        arguments: ["customer"]
```

Then in your controller you can go with:

```php
$customerService = $this->get('customer_custom_service');
```
