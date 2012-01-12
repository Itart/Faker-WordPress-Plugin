<?php
/*
 * PHPFaker WordPress plugin.
 *
 * Copyright (c) 2012, Itart.
 */

/**
 * Class autoregistration for faker components.
 * Singleton.
 *
 * @author    Pavel Gopanenko <pavelgopanenko@gamil.com>
 * @copyright 2012 Itart <info@it-art.su>
 * @license   MIT
 *
 * @package   Faker
 * @since     1.0.0
 */
class Faker_AutoLoader
{
    private static $_instance;

    /**
     * Return autoload instance.
     *
     * @return Faker_AutoLoader
     */
    public static function getInstance()
    {
        return self::$_instance ?: self::$_instance = new self();
    }

    private function __construct()
    {}

    private function __clone()
    {}

    private $_paths;

    /**
     * Register autoloader.
     */
    public function register()
    {
        $paths = $this->_paths;
        spl_autoload_register(function($class) use ($paths) {
            foreach ($paths as $namespace => $path) {
                if (strpos($class, $namespace) === 0) {
                    return require_once $path . '/' . str_replace('\\', '/', $class) . '.php';
                }
            }
        }, true, true);
    }

    /**
     * Registered namespace path.
     *
     * @param string $namespace Namespace
     * @param string $path Directory class path
     * @return Faker_AutoLoader
     * @throws InvalidArgumentException Throws uf path invalid.
     */
    public function registerNamespace($namespace, $path)
    {
        if (!($realpath = realpath($path))) {
            throw new InvalidArgumentException(sprintf('Invalid path "%s"', $path));
        }
        $this->_paths[$namespace] = realpath($realpath);

        return $this;
    }
}
