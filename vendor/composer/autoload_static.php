<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit69b4bdcdb186bb81d07eca3ad9debe40
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit69b4bdcdb186bb81d07eca3ad9debe40::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit69b4bdcdb186bb81d07eca3ad9debe40::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}