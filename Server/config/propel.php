<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'cn_topspace' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\DebugPDO',
                    'dsn'        => 'mysql:host=mysql.leowrd.com;dbname=topspacecn',
                    'user'       => 'admincn',
                    'password'   => 'adminadmin',
                    'attributes' => []
                ],
                'us_topspace' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\DebugPDO',
                    'dsn'        => 'mysql:host=mysql.leowrd.com;dbname=topspacehl',
                    'user'       => 'admintopspace',
                    'password'   => 'adminadmin',
                    'attributes' => []
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'us_topspace',
            'connections' => ['cn_topspace', 'us_topspace']
        ],
        'generator' => [
            'defaultConnection' => 'us_topspace',
            'connections' => ['cn_topspace', 'us_topspace']
        ]
    ]          
];