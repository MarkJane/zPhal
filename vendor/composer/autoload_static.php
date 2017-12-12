<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit64ed87fc396ee7c86e680a4984a402fb
{
    public static $files = array (
        '813f7f13e6576518683f405f89e77e23' => __DIR__ . '/../..' . '/app/common/helpers/basic.php',
        '32f60915e56d91d2e94c51483a91547e' => __DIR__ . '/../..' . '/app/common/helpers/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TOC\\' => 4,
        ),
        'M' => 
        array (
            'Masterminds\\' => 12,
        ),
        'K' => 
        array (
            'Knp\\Menu\\' => 9,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
        'C' => 
        array (
            'Cocur\\Slugify\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TOC\\' => 
        array (
            0 => __DIR__ . '/..' . '/caseyamcl/toc/src',
            1 => __DIR__ . '/..' . '/caseyamcl/toc/tests',
        ),
        'Masterminds\\' => 
        array (
            0 => __DIR__ . '/..' . '/masterminds/html5/src',
        ),
        'Knp\\Menu\\' => 
        array (
            0 => __DIR__ . '/..' . '/knplabs/knp-menu/src/Knp/Menu',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
        'Cocur\\Slugify\\' => 
        array (
            0 => __DIR__ . '/..' . '/cocur/slugify/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit64ed87fc396ee7c86e680a4984a402fb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit64ed87fc396ee7c86e680a4984a402fb::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
