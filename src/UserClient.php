<?php
namespace Zoom;

/**
 * Partial Zoom API client implemented with Guzzle.
 *
 * @method array autoCreateUser(array $config = [])
 */
class UserClient extends BaseClient
{
    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        // Apply some defaults.
        $config += [
            'description_path' => \realpath(__DIR__ . '/descriptions/user.php'),
            'data_type' => 'JSON',
        ];

        // Create the client.
        parent::__construct($config);
    }
}
