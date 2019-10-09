<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcf74372da260d5510f3cfb7ef26821af
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'Oficina\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Oficina\\' => 
        array (
            0 => __DIR__ . '/..' . '/oficinabr/php-classes/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
        'R' => 
        array (
            'Rain' => 
            array (
                0 => __DIR__ . '/..' . '/rain/raintpl/library',
            ),
        ),
    );

    public static $classMap = array (
        'EasyPeasyICS' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/EasyPeasyICS.php',
        'PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
        'PHPMailerOAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauth.php',
        'PHPMailerOAuthGoogle' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauthgoogle.php',
        'POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.pop3.php',
        'SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.smtp.php',
        'ntlm_sasl_client_class' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/ntlm_sasl_client.php',
        'phpmailerException' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcf74372da260d5510f3cfb7ef26821af::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcf74372da260d5510f3cfb7ef26821af::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitcf74372da260d5510f3cfb7ef26821af::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitcf74372da260d5510f3cfb7ef26821af::$classMap;

        }, null, ClassLoader::class);
    }
}
