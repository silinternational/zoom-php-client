# zoom-php-client #
PHP client to interact with the [Zoom](https://zoom.us/) API.

We're slowly building out this client as we need the functionality.

This client is built on top of 
[Guzzle](http://docs.guzzlephp.org/en/latest/index.html), the PHP HTTP Client. 
Guzzle has a simple way to create API clients by describing the API in a 
Swagger-like format without the need to implement every method yourself. So 
adding support for more Zoom APIs is relatively simple. If you want to submit a 
pull request to add another feature, please do. If you don't know how to do 
that, ask us and we might be able to add it in for you.


## Zoom API Docs ##

<https://support.zoom.us/hc/en-us/sections/200305463-API>


## Zoom API Authentication ##

Zoom uses an API key and secret. See [Getting Started with REST API - Zoom 
Support Center](https://support.zoom.us/hc/en-us/articles/201363043-Getting-Started-with-REST-API) 
for details.


## Install ##
Installation is simple with [Composer](https://getcomposer.org/):

    $ composer require silinternational/zoom-php-client


## Usage ##

Example:

```php
<?php

use Zoom\UserClient;

$userClient = new UserClient([
    'api_key' => 'abc',
    'api_secret' => '123',
]);

$user = $userClient->getByEmail([
    'email' => 'test@abc.com',
    'login_type' => 100,
]);
```

Side Note: For the list of possible ```login_type``` values, see Zoom's API 
documentation (at the link above).

### WARNING: Zoom API SSL Issues ###

When testing this on my Windows 7 PC using a Git Bash console (from Git 2.5), 
the following error is returned: 

    GuzzleHttp\Command\Exception\CommandException: Error executing command: cURL error 60: See http://curl.haxx.se/libcurl/c/libcurl-errors.html

This appears to mean that whatever SSL CA bundle cURL is using on my computer, 
it does not contain the root CA that Zoom's API uses. To pass parameters to 
Guzzle related to this, you can do something like the following: 

    $userClient = $this->getUserClient([
	    // ...
        'http_client_options' => [
            'defaults' => [
                'verify' => __DIR__ . '/../../ca-bundle.crt',
            ],
        ],
    ]);

In this example, I pointed ```verify``` at a downloaded copy of the 
[CA bundle](https://raw.githubusercontent.com/bagder/ca-bundle/master/ca-bundle.crt) 
that Mozilla provides, as mentioned in the Guzzle documentation about the 
[verify option](http://docs.guzzlephp.org/en/v5/request-options.html#verify-option).

## Tests ##

To run the unit tests for this, copy the ```/tests/real-test-data.local.php.dist``` 
file to ```/tests/real-test-data.local.php``` and enter real data to test with.

## Guzzle Service Client Notes ##
- Tutorial on developing an API client with Guzzle Web Services:  
  <http://www.phillipshipley.com/2015/04/creating-a-php-nexmo-api-client-using-guzzle-web-service-client-part-1/>
- Presentation by Jeremy Lindblom:  
  <https://speakerdeck.com/jeremeamia/building-web-service-clients-with-guzzle-1>
- Example by Jeremy Lindblom:  
  <https://github.com/jeremeamia/sunshinephp-guzzle-examples>
- Parameter docs in source comments:  
  <https://github.com/guzzle/guzzle-services/blob/master/src/Parameter.php>
- Guzzle 3 Service Descriptions documentation (at least mostly still relevant):  
  <https://guzzle3.readthedocs.org/webservice-client/guzzle-service-descriptions.html>
