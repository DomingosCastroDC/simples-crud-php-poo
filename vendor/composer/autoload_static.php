<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb8e20aaf31b444233c793b2bd0fef299
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb8e20aaf31b444233c793b2bd0fef299::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb8e20aaf31b444233c793b2bd0fef299::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
