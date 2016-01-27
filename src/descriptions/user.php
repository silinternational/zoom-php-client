<?php return [
    'baseUrl' => 'https://api.zoom.us',
    'apiVersion' => 'v1',
    'operations' => [
        'AutoCreate' => [
            'httpMethod' => 'POST',
            'uri' => '/{ApiVersion}/user/autocreate',
            'responseModel' => 'Result',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'api_key' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'api_secret' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'email' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'type' => [
                    'required' => false,
                    'type' => 'integer',
                    'location' => 'json',
                ],
                'password' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'first_name' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'last_name' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'disable_chat' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'json',
                ],
                'enable_e2e_encryption' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'json',
                ],
                'enable_silent_mode' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'json',
                ],
                'disable_group_hd' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'json',
                ],
                'disable_recording' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'json',
                ],
                'enable_cmr' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'json',
                ],
                'enable_auto_recording' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'json',
                ],
                'enable_cloud_auto_recording' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'json',
                ],
                'enable_webinar' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'json',
                ],
                'webinar_capacity' => [
                    'required' => false,
                    'type' => 'integer',
                    'location' => 'json',
                ],
                'enable_large' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'json',
                ],
                'large_capacity' => [
                    'required' => false,
                    'type' => 'integer',
                    'location' => 'json',
                ],
                'disable_feedback' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'json',
                ],
                'disable_jbh_reminder' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'json',
                ],
                'dept' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json',
                ],
            ]
        ],
    ],
    'models' => [
        'Result' => [
            'type' => 'object',
            'properties' => [
                'statusCode' => ['location' => 'statusCode'],
            ],
            'additionalProperties' => [
                'location' => 'json'
            ]
        ]
    ]
];
