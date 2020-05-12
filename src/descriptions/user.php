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
                    'location' => 'formParam',
                ],
                'api_secret' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'data_type' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'email' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'type' => [
                    'required' => false,
                    'type' => 'integer',
                    'location' => 'formParam',
                ],
                'password' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'first_name' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'last_name' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'disable_chat' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'enable_e2e_encryption' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'enable_silent_mode' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'disable_group_hd' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'disable_recording' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'enable_cmr' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'enable_auto_recording' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'enable_cloud_auto_recording' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'enable_webinar' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'webinar_capacity' => [
                    'required' => false,
                    'type' => 'integer',
                    'location' => 'formParam',
                ],
                'enable_large' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'large_capacity' => [
                    'required' => false,
                    'type' => 'integer',
                    'location' => 'formParam',
                ],
                'disable_feedback' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'disable_jbh_reminder' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'dept' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
            ]
        ],
        'CheckEmail' => [
            'httpMethod' => 'POST',
            'uri' => '/{ApiVersion}/user/checkemail',
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
                    'location' => 'formParam',
                ],
                'api_secret' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'data_type' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'email' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
            ]
        ],
        'Delete' => [
            'httpMethod' => 'POST',
            'uri' => '/{ApiVersion}/user/delete',
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
                    'location' => 'formParam',
                ],
                'api_secret' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'data_type' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'id' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
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
                'api_key' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'api_secret' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'data_type' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'id' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
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
                'api_key' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'api_secret' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'data_type' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'email' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'login_type' => [
                    'required' => true,
                    'type' => 'integer',
                    'location' => 'formParam',
                ],
            ]
        ],
        'Update' => [
            'httpMethod' => 'POST',
            'uri' => '/{ApiVersion}/user/update',
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
                    'location' => 'formParam',
                ],
                'api_secret' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'data_type' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'id' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'type' => [
                    'required' => false,
                    'type' => 'integer',
                    'location' => 'formParam',
                ],
                'first_name' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'last_name' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'disable_chat' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'enable_e2e_encryption' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'enable_silent_mode' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'disable_group_hd' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'disable_recording' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'enable_cmr' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'enable_auto_recording' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'enable_cloud_auto_recording' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'enable_webinar' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'webinar_capacity' => [
                    'required' => false,
                    'type' => 'integer',
                    'location' => 'formParam',
                ],
                'enable_large' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'large_capacity' => [
                    'required' => false,
                    'type' => 'integer',
                    'location' => 'formParam',
                ],
                'pmi' => [
                    'required' => false,
                    'type' => 'numeric', // because it could be bigger than int.
                    'location' => 'formParam',
                ],
                'disable_feedback' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'disable_jbh_reminder' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'formParam',
                ],
                'dept' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
                ],
                'timezone' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'formParam',
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
