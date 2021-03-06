<?php
return [
    'default' => 'service',

    'service' => [
        'base_uri' => env('PASSPORT_CLIENT_BASE_URI', 'http://boss.aiicall.com'),

        'query' => env('PASSPORT_CLIENT_QUERY', '/oauth/token'),

        'authorize_redirect' => env('PASSPORT_CLIENT_AUTHORIZE_REDIRECT', '/oauth/authorize'),

        //授权码授权
        'authorize_grant' => [
            'client_id' => env('PASSPORT_CLIENT_AUTHORIZE_ID', 1),
            'redirect_uri' => env('PASSPORT_CLIENT_AUTHORIZE_REDIRECT_URI', 'http://example.com/callback'),
            'scope' => env('PASSPORT_CLIENT_AUTHORIZE_SCOPE', ''),
        ],
        // 机器授权
        'machine_grant' => [
            'client_id' => env('PASSPORT_CLIENT_MACHINE_ID', 1),
            'client_secret' => env('PASSPORT_CLIENT_MACHINE_SECRET', ''),
            'scope' => env('PASSPORT_CLIENT_MACHINE_SCOPE', ''),
        ],
        // 密码授权
        'password_grant' => [
            'client_id' => env('PASSPORT_CLIENT_PASSWORD_ID', 1),
            'client_secret' => env('PASSPORT_CLIENT_PASSWORD_SECRET', ''),
            'scope' => env('PASSPORT_CLIENT_PASSWORD_SCOPE', ''),
        ],

        // GuzzleHttp 选项配置
        'guzzle_options' => [
            'timeout' => 3
        ],

        // 可配置 自定义现实 XsKit\PassportClient\Contracts\ResponseHandleContract 接口的响应数据的处理类
        // 处理类返回一个匿名函数,函数可用$this 指向是 XsKit\PassportClient\Http\HttpResponse 响应实例
        // 该函数接收一个 Psr\Http\Message\ResponseInterface 响应实例
        'response_handle' => \App\Extensions\Api\ResponseHandle::class,
    ],


];
