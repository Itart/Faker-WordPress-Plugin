<?php
/*
 * PHPFaker WordPress plugin.
 *
 * Copyright (c) 2012, Itart.
 */

/**
 * Faker instance static wrapper.
 *
 * @author    Pavel Gopanenko <pavelgopanenko@gamil.com>
 * @copyright 2012 Itart <info@it-art.su>
 * @license   MIT
 *
 * @package   Faker
 * @since     1.0.0
 */
class Faker
{
    private static $_faker;

    /**
     * Return Faker instance.
     *
     * @return \PHPFaker\Faker
     */
    public static function getFaker()
    {
        return self::$_faker ?: self::$_faker = new \PHPFaker\Faker();
    }
}
