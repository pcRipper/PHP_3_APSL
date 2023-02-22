<?php

return [
    'routing' => [
        '/' => \Apsl\Inf03\Webdev\Pages\HomePage::class,
        '/contact' => \Apsl\Inf03\Webdev\Pages\ContactPage::class,
        '/login' => \Apsl\Inf03\Webdev\Pages\LoginPage::class,
        '/secretPage' => \Apsl\Inf03\Webdev\Pages\SecretPage::class,
        '/restore_password' => \Apsl\Inf03\Webdev\Pages\RestorePassword::class
    ],
    '_404' => \Apsl\Inf03\Webdev\Pages\Error404Page::class
];
