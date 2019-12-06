<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit74f4a369f82e5d260097c454d1c5e494
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'model\\' => 6,
        ),
        'c' => 
        array (
            'controller\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/model',
        ),
        'controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/controller',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit74f4a369f82e5d260097c454d1c5e494::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit74f4a369f82e5d260097c454d1c5e494::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
