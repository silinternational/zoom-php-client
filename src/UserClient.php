<?php
namespace Zoom;

/**
 * Partial Zoom API client implemented with Guzzle.
 *
 * @method array autoCreateUser(array $config = [])
 */
class UserClient extends BaseClient
{
    /* Values copied from .../v1/user/getbyemail portion of Zoom API Docs at
     * "https://support.zoom.us/hc/en-us/articles/201363033-REST-User-API". */
    const LOGIN_TYPE_SNS_FACEBOOK = 0;
    const LOGIN_TYPE_SNS_GOOGLE = 1;
    const LOGIN_TYPE_SNS_API = 99;
    const LOGIN_TYPE_SNS_ZOOM = 100;
    const LOGIN_TYPE_SNS_SSO = 101;
    
    /* Values copied from .../v1/user/create potion of Zoom API Docs at
     * "https://support.zoom.us/hc/en-us/articles/201363033-REST-User-API". */
    const USER_TYPE_BASIC = 1;
    const USER_TYPE_PRO = 2;
    const USER_TYPE_CORP = 3; // Corp. is for on-premise deployments.
    
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
