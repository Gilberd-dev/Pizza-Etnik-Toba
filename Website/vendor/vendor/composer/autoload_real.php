<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInita0aeb3a4f578cb8d9fcf2333a4d751eb
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInita0aeb3a4f578cb8d9fcf2333a4d751eb', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInita0aeb3a4f578cb8d9fcf2333a4d751eb', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInita0aeb3a4f578cb8d9fcf2333a4d751eb::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
