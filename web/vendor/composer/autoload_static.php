<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdd4c7a2c6ee5e21a523308e10b10b65a
{
    public static $prefixesPsr0 = array (
        'E' => 
        array (
            'Everyman\\Neo4j' => 
            array (
                0 => __DIR__ . '/..' . '/everyman/neo4jphp/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitdd4c7a2c6ee5e21a523308e10b10b65a::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
