<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitab4167ac2b4a87ff4f25dadd25d43d17
{
    public static $files = array (
        '3a37ebac017bc098e9a86b35401e7a68' => __DIR__ . '/..' . '/mongodb/mongodb/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'mikemccabe\\JsonPatch\\' => 21,
        ),
        'S' => 
        array (
            'Symfony\\Component\\EventDispatcher\\' => 34,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'MongoDB\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'mikemccabe\\JsonPatch\\' => 
        array (
            0 => __DIR__ . '/..' . '/mikemccabe/json-patch-php/src',
        ),
        'Symfony\\Component\\EventDispatcher\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/event-dispatcher',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'MongoDB\\' => 
        array (
            0 => __DIR__ . '/..' . '/mongodb/mongodb/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'O' => 
        array (
            'OpenCloud' => 
            array (
                0 => __DIR__ . '/..' . '/rackspace/php-opencloud/lib',
            ),
        ),
        'G' => 
        array (
            'Guzzle\\Tests' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/guzzle/tests',
            ),
            'Guzzle' => 
            array (
                0 => __DIR__ . '/..' . '/guzzle/guzzle/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitab4167ac2b4a87ff4f25dadd25d43d17::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitab4167ac2b4a87ff4f25dadd25d43d17::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitab4167ac2b4a87ff4f25dadd25d43d17::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
