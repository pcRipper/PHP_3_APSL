<?php

return [
    'routing' => [
        '/' => \Apsl\Inf03\Webdev\Pages\HomePage::class,
        '/contact' => \Apsl\Inf03\Webdev\Pages\ContactPage::class,
        '/secretPage' => \Apsl\Inf03\Webdev\Pages\SecretPage::class,

        '/mediator/login' => \Apsl\Inf03\Webdev\Pages\Mediator\LoginPage::class,
        '/mediator/registrate' => \Apsl\Inf03\Webdev\Pages\Mediator\RegistrationPage::class
    ],
    '_404' => \Apsl\Inf03\Webdev\Pages\Error404Page::class
];
