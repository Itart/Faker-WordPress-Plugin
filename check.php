<?php
/*
 * PHPFaker WordPress plugin.
 *
 * Copyright (c) 2012, Itart.
 */

$disable_messages = array();

// PHP version check
if (!version_compare(PHP_VERSION, '5.3', '>='))
    $disable_messages[] = 'PHP version 5.3 or later';

// WP version check
if (!version_compare($wp_version, '3.3', '>='))
    $disable_messages[] = 'WordPress 3.3 or later';

if ($disable_messages) {

    // Display a message about improper versions
    add_action('admin_notices', 'faker_plugin_deactive_message');
    function faker_plugin_deactive_message() {
        global $disable_messages;
        echo
        '<div class="error"><p>' .
        	'PHP Faker required ' . implode(', ', $disable_messages) . '. ' .
            __('Plugin <strong>deactivated</strong>.') .
        '</p></div>';
    }

    // Disable the plugin
    add_action('admin_init', 'faker_plugin_deactivate');
    function faker_plugin_deactivate() {
        deactivate_plugins(dirname(__FILE__) . '/faker.php');
    }
}

return false == $disable_messages;
