<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9c49dfca010b99ba75982b18d97d301b
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9c49dfca010b99ba75982b18d97d301b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9c49dfca010b99ba75982b18d97d301b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9c49dfca010b99ba75982b18d97d301b::$classMap;

        }, null, ClassLoader::class);
    }
}
