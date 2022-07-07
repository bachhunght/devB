<?php
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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'leontyna_mainwp' );

/** MySQL database username */
define( 'DB_USER', 'leontyna_mainwp' );

/** MySQL database password */
define( 'DB_PASSWORD', 'G=I(kOCFdsr!' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ')_0%S4nl7+(WW_ve]Cv f<V:L9(s3(D0,j|(}:gQ,}caN2VfmG+YVvtBv+tM2<K$' );
define( 'SECURE_AUTH_KEY',  '|/P> ;S{|4SZh0{1;S [96-0WYc_b5n!g4ArVRstSAa~C~!8bH#u?!0Fd)J/*E$(' );
define( 'LOGGED_IN_KEY',    'n[z:b{Xa?LWf:jN:Se`MyC,ED6Z4d<AIelT?P/p2gB}2_qUNPCw</S88JKBH$64R' );
define( 'NONCE_KEY',        'G/,LsTSSR&.Z]n-H0JIR>xjoip?{2;z7uEokK6{#@LVU4lThonD@3aD<TGv4}q2=' );
define( 'AUTH_SALT',        '17cbNYS7&N4[+>#onol[Q{R?Hn~GIyy8hD5.b]mpZ^0b$99n-H>K_wB)UlpeGrM_' );
define( 'SECURE_AUTH_SALT', 'E]So^e~!0OjcdZ#x*azRfO{bOjQT<NmE6)tFOslh!)Ya@Bh4yJr`R?D^mFV#6Du>' );
define( 'LOGGED_IN_SALT',   'KVK|vqHID0%7QjZ#=[b3On0_T x`og;~v&)6PO@`T4Y:BpoYId2!+x{qILHN.5R!' );
define( 'NONCE_SALT',       'g4h[Qe]1/f:.M;N1vFZ0^L?hT3s}6X_9V kKaYD3iUgblh1$E7?=_X<`},o6AUQ2' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
