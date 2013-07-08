<?php

//--------------------------------------------------------------------------
//
// Local database connectivity:
//
//--------------------------------------------------------------------------

define('DB_HOST', 'XXXXXX');
define('DB_NAME', 'XXXXXX');
define('DB_USER', 'XXXXXX');
define('DB_PASSWORD', 'XXXXXX');

//--------------------------------------------------------------------------
//
// Remote database connectivity:
//
//--------------------------------------------------------------------------

# SSH tunneling:
# ssh -N -L 5555:127.0.0.1:3306 user@foo.com -vv
# 1) Open terminal.
# 2) Execute above command.
# 3) Enter password.
# 4) Keep session open until done.

// define('DB_HOST', '127.0.0.1:5555'); // For SSH tunneling.
// define('DB_NAME', 'XXXXXX');
// define('DB_USER', 'XXXXXX');
// define('DB_PASSWORD', 'XXXXXX');

//--------------------------------------------------------------------------
//
// Shared settings:
//
//--------------------------------------------------------------------------

define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

# https://api.wordpress.org/secret-key/1.1/salt/
define('AUTH_KEY',         '');
define('SECURE_AUTH_KEY',  '');
define('LOGGED_IN_KEY',    '');
define('NONCE_KEY',        '');
define('AUTH_SALT',        '');
define('SECURE_AUTH_SALT', '');
define('LOGGED_IN_SALT',   '');
define('NONCE_SALT',       '');

define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/wp');
define('WP_HOME', 'http://' . $_SERVER['SERVER_NAME']);

define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/content');
define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/content');

$table_prefix  = 'wp_';

define('WPLANG', '');

ini_set('display_errors', 0);
define('WP_DEBUG_DISPLAY', FALSE);
//define('SAVEQUERIES', TRUE);
//define('WP_DEBUG', TRUE);

#define('WP_DEFAULT_THEME', '');

if ( ! defined('ABSPATH')) define('ABSPATH', dirname(__FILE__) . '/wp/');

require_once(ABSPATH . 'wp-settings.php');
