<?php
/*
 * PHPFaker WordPress plugin.
 *
 * Copyright (c) 2012, Itart.
 */

/*
Plugin Name: Faker
Plugin URI: http://expert-services.ru/
Description: Adds a function to generate fake data.
Version: 1.0.0
Author: Pavel Gopanenko
Author URI: https://plus.google.com/113396466581339964097
License: MIT
*/

// Check enviroment
if (!(require_once dirname(__FILE__) . '/check.php'))
    return;

require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/class-autoloader.php';
require_once __DIR__ . '/includes/class-faker.php';

try {

    Faker_AutoLoader::getInstance()->registerNamespace('PHPFaker', __DIR__ . '/phpfaker/lib')
                                   ->register();

} catch (Exception $e) {

    if (defined('WP_DEBUG') && WP_DEBUG)
        wp_die(faker_exception_format($e));
    else
        throw $e;

}
