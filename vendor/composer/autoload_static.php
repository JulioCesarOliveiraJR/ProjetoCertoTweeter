<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit634c0bb7f622caf13dba91fe69c5502c
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MF\\' => 3,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MF\\' => 
        array (
            0 => __DIR__ . '/..' . '/MF',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit634c0bb7f622caf13dba91fe69c5502c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit634c0bb7f622caf13dba91fe69c5502c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit634c0bb7f622caf13dba91fe69c5502c::$classMap;

        }, null, ClassLoader::class);
    }
}
