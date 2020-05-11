<?php
namespace Zoom;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;

/**
 * Partial Zoom API client implemented with Guzzle.
 * BaseClient class to implement common features
 */
class BaseClient extends GuzzleClient
{
    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        // Apply some defaults.
        $config += [
            'max_retries' => 3,
        ];

        // Create the client.
        parent::__construct(
            $this->getHttpClientFromConfig($config),
            $this->getDescriptionFromConfig($config),
            null,
            null,
            null,
            $config
        );

        $this->setDefaults($config);
    }

    private function getHttpClientFromConfig(array $config)
    {
        // If a client was provided, return it.
        if (isset($config['http_client'])) {
            return $config['http_client'];
        }

        // Create a Guzzle HttpClient.
        $clientOptions = isset($config['http_client_options'])
            ? $config['http_client_options']
            : [];
        $client = new HttpClient($clientOptions);

        return $client;
    }

    private function getDescriptionFromConfig(array $config)
    {
        // If a description was provided, return it.
        if (isset($config['description'])) {
            return $config['description'];
        }

        // Load service description data.
        $data = is_readable($config['description_path'])
            ? include $config['description_path']
            : null;

        // Override description from local config if set
        if (isset($config['description_override'])) {
            $data = array_merge($data, $config['description_override']);
        }

        return new Description($data);
    }

    private function setDefaults(array $config)
    {
        // Ensure that the credentials have been provided.
        if (!isset($config['api_key'])) {
            throw new \InvalidArgumentException(
                'You must provide an api_key.'
            );
        }
        if (!isset($config['api_secret'])) {
            throw new \InvalidArgumentException(
                'You must provide an api_secret.'
            );
        }

        $defaults = [];

        // If it's provided, set the data type in a default variable so that we
        // don't have to pass it to every method individually.
        if (isset($config['data_type'])) {
            $defaults['data_type'] = $config['data_type'];
        }

        // Set the credentials in default variables so that we don't have to
        // pass them to every method individually.
        $defaults['api_key'] = $config['api_key'];
        $defaults['api_secret'] = $config['api_secret'];

        // Ensure that ApiVersion is set.
        $defaults['ApiVersion'] = $this->getDescription()->getApiVersion();

        $this->setConfig('defaults', $defaults);
    }
}
