# zoom-php-client
PHP client to interact with the Zoom API.

We're slowly building out this client as we need the functionality.

This client is built on top of 
[Guzzle](http://docs.guzzlephp.org/en/latest/index.html), the PHP HTTP Client.

Guzzle has a simple way to create API clients by describing the API in a 
Swagger-like format without the need to implement every method yourself. So 
adding support for more Zoom APIs is relatively simple. If you want to submit a 
pull request to add another feature, please do. If you don't know how to do 
that, ask us and we might be able to add it in for you.


## Zoom API Docs ##

TODO


## Zoom API Authentication ##

TODO


## Install ##
Installation is simple with [Composer](https://getcomposer.org/):

    $ composer require silinternational/zoom-php-client


## Usage ##

TODO


## Guzzle Service Client Notes ##
- Tutorial on developing an API client with Guzzle Web Services: 
  http://www.phillipshipley.com/2015/04/creating-a-php-nexmo-api-client-using-guzzle-web-service-client-part-1/
- Presentation by Jeremy Lindblom: 
  https://speakerdeck.com/jeremeamia/building-web-service-clients-with-guzzle-1
- Example by Jeremy Lindblom: 
  https://github.com/jeremeamia/sunshinephp-guzzle-examples
- Parameter docs in source comments: 
  https://github.com/guzzle/guzzle-services/blob/master/src/Parameter.php
