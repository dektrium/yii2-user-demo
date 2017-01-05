<?php

/**
 * Mailer configuration.
 * You can choose between preconfigured mailer components (file, sendmail and smtp) by changing value of MAILER_DRIVER
 * env property in your .env file.
 * @see http://www.yiiframework.com/doc-2.0/guide-tutorial-mailing.html
 */

use yii\helpers\ArrayHelper;

$defaults = [
    'useFileTransport' => false,
    'viewPath' => '@app/mail',
    'htmlLayout' => 'layouts/html',
    'textLayout' => 'layouts/text',
];

$drivers = [
    'file' => [
        'useFileTransport' => true,
    ],
    'sendmail' => [
        'transport' => [
            'class' => 'Swift_MailTransport',
        ],
    ],
    'smtp' => [
        'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => env('SMTP_HOST', 'localhost'),
            'username' => env('SMTP_USERNAME', null),
            'password' => env('SMTP_PASSWORD', null),
            'port' => env('SMTP_PORT', 25),
            'encryption' => env('SMTP_ENCRYPTION', null),
        ],
    ],
];

return ArrayHelper::merge($defaults, $drivers[env('MAILER_DRIVER', 'file')]);
