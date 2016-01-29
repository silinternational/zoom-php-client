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
                    'location' => 'postField',
                ],
                'api_secret' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'postField',
                ],
                'email' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'postField',
                ],
                'type' => [
                    'required' => false,
                    'type' => 'integer',
                    'location' => 'postField',
                ],
                'password' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'postField',
                ],
                'first_name' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'postField',
                ],
                'last_name' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'postField',
                ],
                'disable_chat' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'postField',
                ],
                'enable_e2e_encryption' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'postField',
                ],
                'enable_silent_mode' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'postField',
                ],
                'disable_group_hd' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'postField',
                ],
                'disable_recording' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'postField',
                ],
                'enable_cmr' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'postField',
                ],
                'enable_auto_recording' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'postField',
                ],
                'enable_cloud_auto_recording' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'postField',
                ],
                'enable_webinar' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'postField',
                ],
                'webinar_capacity' => [
                    'required' => false,
                    'type' => 'integer',
                    'location' => 'postField',
                ],
                'enable_large' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'postField',
                ],
                'large_capacity' => [
                    'required' => false,
                    'type' => 'integer',
                    'location' => 'postField',
                ],
                'disable_feedback' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'postField',
                ],
                'disable_jbh_reminder' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'postField',
                ],
                'dept' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'postField',
                ],
            ]
        ],
        'Get' => [
            'httpMethod' => 'POST',
            'uri' => '/{ApiVersion}/user/get',
            'responseModel' => 'Result',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'id' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'postField',
                ],
            ]
        ],
        'GetByEmail' => [
            'httpMethod' => 'POST',
            'uri' => '/{ApiVersion}/user/getbyemail',
            'responseModel' => 'Result',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'email' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'postField',
                ],
                'login_type' => [
                    'required' => true,
                    'type' => 'integer',
                    'location' => 'postField',
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
