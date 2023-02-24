<?php

return [
    'routing' => [
        '/' => \Apsl\Inf03\Webdev\Pages\HomePage::class,
        '/contact' => \Apsl\Inf03\Webdev\Pages\ContactPage::class,
        '/secretPage' => \Apsl\Inf03\Webdev\Pages\SecretPage::class,
        
        '/restore_password' => \Apsl\Inf03\Webdev\Pages\RestorePassword\RestorePassword::class,
        '/restore_password/send' => \Apsl\Inf03\Webdev\Pages\RestorePassword\SendPassword::class,
        '/restore_password/new-password' => \Apsl\Inf03\Webdev\Pages\RestorePassword\UpdatePasswordForm::class,

        '/db_access/login' => \Apsl\Inf03\Webdev\Pages\LoginPage::class,
        '/db_access/registrate' => \Apsl\Inf03\Webdev\Pages\RegistrationPage::class
    ],
    '_404' => \Apsl\Inf03\Webdev\Pages\Error404Page::class
];
