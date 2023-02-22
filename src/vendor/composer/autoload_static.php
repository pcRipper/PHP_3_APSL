<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf5799dfdec6e4abd758a17467f102891
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/lib',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInitf5799dfdec6e4abd758a17467f102891::$fallbackDirsPsr4;
            $loader->classMap = ComposerStaticInitf5799dfdec6e4abd758a17467f102891::$classMap;

        }, null, ClassLoader::class);
    }
}