<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=archdb',
            'username' => 'root',
            'password' => 'clyde123',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                 'class' => 'Swift_SmtpTransport',
                 'host' => 'mail.bekazon.com',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
                 'username' => 'fahmy@bekazon.com',
                 'password' => 'Clyde123',
                 'port' => '26', // Port 25 is a very common port too
                 //'encryption' => 'tls', // It is often used, check your provider or mail server specs
            ],
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            // 'enableStrictParsing' => false,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/country'],
            ],
        ]
    ],
    'modules' => [
        'api' => [
            'class' => 'common\modules\api\Module',
        ],
    ],
    
];
