<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8be399a9fabe7eb3b9bd6369c19ad715
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Schooltrip\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Schooltrip\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8be399a9fabe7eb3b9bd6369c19ad715::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8be399a9fabe7eb3b9bd6369c19ad715::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8be399a9fabe7eb3b9bd6369c19ad715::$classMap;

        }, null, ClassLoader::class);
    }
}
