<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb64bf0691b7b44cea2e3ba7436c5145c
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb64bf0691b7b44cea2e3ba7436c5145c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb64bf0691b7b44cea2e3ba7436c5145c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
