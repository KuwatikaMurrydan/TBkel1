<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit0e5d87979c3063989a39b5e0375f9b77
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

        spl_autoload_register(array('ComposerAutoloaderInit0e5d87979c3063989a39b5e0375f9b77', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit0e5d87979c3063989a39b5e0375f9b77', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit0e5d87979c3063989a39b5e0375f9b77::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
