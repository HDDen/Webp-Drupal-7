<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit96a8c7bf3f0a8d1360b680e24bb21856
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'DiDom\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'DiDom\\' => 
        array (
            0 => __DIR__ . '/..' . '/imangazaliev/didom/src/DiDom',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit96a8c7bf3f0a8d1360b680e24bb21856::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit96a8c7bf3f0a8d1360b680e24bb21856::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
