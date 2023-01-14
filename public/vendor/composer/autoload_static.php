<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit00127b08c9b97d2848612e5eb7b5a436
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'GatewayClient\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'GatewayClient\\' => 
        array (
            0 => __DIR__ . '/..' . '/workerman/gatewayclient',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit00127b08c9b97d2848612e5eb7b5a436::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit00127b08c9b97d2848612e5eb7b5a436::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit00127b08c9b97d2848612e5eb7b5a436::$classMap;

        }, null, ClassLoader::class);
    }
}
