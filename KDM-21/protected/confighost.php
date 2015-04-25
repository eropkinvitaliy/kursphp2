<?php

return [

    'settings' => include(__DIR__ . '/settings.php'),

    'db' => [
        'default' => [
            'driver' => 'mysql',
            'host' => 'mysql.hostinger.ru',
            'dbname' => 'u592400041_kdm',
            'user' => 'u592400041_admin',
            'password' => 'qwertyQQ1',
        ]
    ],
    'auth' => [
        'expire' => 31536000 // 1 year
    ],
    'mail' => [
        'method' => 'php',
    ],
    'extensions' => [
        'jquery' => [
            'ui' => true,
        ],
        'jstree' => [
            'autoload' => false,
        ],
        'bootstrap' => [
            'location' => 'local',
            'theme' => 'cosmo',
        ],
        'fileupload' => [
            'autoload' => false,
        ],
        'ckeditor' => [
            'location' => 'local',
            'autoload' => false,
        ],
        'ckfinder' => [
            'autoload' => false,
        ],
        'fotorama'=>[
            'autoload' => true,
        ]
    ],
    'errors' => [
        '404' => '//Index/404'
    ]
];