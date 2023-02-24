<?php

return [
    'routing' => [
        '/' => \Apsl\Inf03\Webdev\Pages\HomePage::class,
        '/contact' => \Apsl\Inf03\Webdev\Pages\ContactPage::class,
        '/secretPage' => \Apsl\Inf03\Webdev\Pages\SecretPage::class,
        
        '/restore-password' => \Apsl\Inf03\Webdev\Pages\RestorePassword\RestorePassword::class,
        '/restore-password/send' => \Apsl\Inf03\Webdev\Pages\RestorePassword\SendPassword::class,
        '/restore-password/new-password' => \Apsl\Inf03\Webdev\Pages\RestorePassword\UpdatePasswordForm::class,
        '/restore-password/send-new-password' => \Apsl\Inf03\Webdev\Pages\RestorePassword\UpdatePassword::class,

        '/db-access/login' => \Apsl\Inf03\Webdev\Pages\LoginPage::class,
        '/db-access/registrate' => \Apsl\Inf03\Webdev\Pages\RegistrationPage::class
    ],
    '_404' => \Apsl\Inf03\Webdev\Pages\Error404Page::class
];
