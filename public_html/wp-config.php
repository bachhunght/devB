<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache




/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

/*
 * cPanel & WHM® Site Software
 *
 * Core updates should be disabled entirely by the cPanel & WHM® Site Software
 * plugin, as Site Software will provide the updates.  The following line acts
 * as a safeguard, to avoid automatically updating if that plugin is disabled.
 *
 * Allowing updates outside of the Site Software interface in cPanel & WHM®
 * could lead to DATA LOSS.
 *
 * Re-enable automatic background updates at your own risk.
 */

define( 'WP_SITEURL', 'http://idealmattress.docksal' );
define( 'WP_HOME', 'http://idealmattress.docksal' );

// define( 'WP_AUTO_UPDATE_CORE', false );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'default');

/** MySQL database username */
define('DB_USER', 'user');

/** MySQL database password */
define('DB_PASSWORD', 'user');

/** MySQL hostname */
define('DB_HOST', 'db');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'l2wrePImVo7Ggq2CWX2X7NL5dhe3hvAbttSawTNuCi3jIXTWEuKeDW1oOk2M_eg5');
define('SECURE_AUTH_KEY',  'zR29mhbA03FnP0SRXL6i0OX3RUVV0MfgZvYu5mMbF0DfKSFLAi0n8UdHEw1PXyTv');
define('LOGGED_IN_KEY',    'GPRolEVME9DP5naC2GUbyMPYXL84IBTNgn8dHpj44Cd8CbTP915rhOb0fmixr1HD');
define('NONCE_KEY',        'yW6f3zRn4Jqd9sgo3zRbgYotZ2r9gndBTbM0hNTNVJVnqCipQdbss6CZsJMFcU1U');
define('AUTH_SALT',        'uJ2_kBK4hqfNQfLuqDztsNtYX9LIBKnfGldk_6grTu50tBFUzEc9FDHf7oZ6TXqP');
define('SECURE_AUTH_SALT', 'MM6ef4paOiRnKYNNn9dR0FN_NrFMg9I2bMi7jrhJfqiDf0Lu5kKK8Qd7GETwCHSQ');
define('LOGGED_IN_SALT',   'OJYPk0faXxyv5ljJU892YpRl8wSHVibulE4TZrvR5fGGyjjB4eJl_YViSQjUtbY6');
define('NONCE_SALT',       'MtlAXBtJLXW2wRNr3GfKMMqAEad2cLcCt0eCu3pnaL5LsmCEVZtnzUqGCFrThQWO');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tezov_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
