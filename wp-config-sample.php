<?php

/**
 * Bueller? ... Bueller? ... Bueller?
 *
 * @see https://github.com/mhulse/bueller
 * @version v1.0.1
 */

define('DB_NAME', 'database_name_here');
define('DB_USER', 'username_here');
define('DB_PASSWORD', 'password_here');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

$table_prefix  = 'wp_';

//----------------------------------------------------------------------

/**
 * SSH tunneling.
 *
 * $ ssh -N -L 5555:127.0.0.1:3306 user@foo.com -vv
 *
 * 1) Open terminal.
 * 2) Execute above command.
 * 3) Enter password.
 * 4) Keep session open until done.
 */

// define('DB_HOST', '127.0.0.1:5555'); // For SSH tunneling.
// define('DB_NAME', 'XXXXXX');
// define('DB_USER', 'XXXXXX');
// define('DB_PASSWORD', 'XXXXXX');

//----------------------------------------------------------------------

# https://api.wordpress.org/secret-key/1.1/salt/
define('AUTH_KEY',         '');
define('SECURE_AUTH_KEY',  '');
define('LOGGED_IN_KEY',    '');
define('NONCE_KEY',        '');
define('AUTH_SALT',        '');
define('SECURE_AUTH_SALT', '');
define('LOGGED_IN_SALT',   '');
define('NONCE_SALT',       '');

//----------------------------------------------------------------------

define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/wp');
define('WP_HOME', 'http://' . $_SERVER['SERVER_NAME']);

define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/content');
define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/content');

//----------------------------------------------------------------------

/**
 * This will log all errors notices and warnings to a file called
 * `debug.log` in `/wp-content`. If Apache does not have write permission,
 * you may need to create the file first and set the appropriate `666`
 * permissions.
 *
 * ```
 * $ tail -f wp-content/debug.log
 * ```
 *
 * @see http://wordpress.stackexchange.com/a/69552/32387
 */

define('WP_DEBUG', TRUE);
define('WP_DEBUG_LOG', TRUE);
define('WP_DEBUG_DISPLAY', FALSE);
@ini_set('display_errors', 0);

//----------------------------------------------------------------------

//define('WP_DEFAULT_THEME', '');
//define('DISALLOW_FILE_EDIT', TRUE);

//----------------------------------------------------------------------

if ( ! defined('ABSPATH')) define('ABSPATH', dirname(__FILE__) . '/wp/');

require_once(ABSPATH . 'wp-settings.php');
