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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'WooCommerce' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'G2aS32yHuvw@6XQGd2wiDg&+<dqy.99=_S*]T+4f}=M`/S.tVm58p{q!cQgOt?u ' );
define( 'SECURE_AUTH_KEY',  'xXD1S0_-Hu8g5Je%pHQN&;~^he+)i$}76*&df&!P)(2B^}.lrQc(];STsj87uC[{' );
define( 'LOGGED_IN_KEY',    '}xLkgsG -+_TS/*/YQc:]g_ZTn0S=T,o0emODw1L^Vn %u`3;fh)F{]5dv^%kcIq' );
define( 'NONCE_KEY',        '7vMqL6GENwq4)qQmrACss)i.~jXba<bV}p6 aH+/+v=<8sv^NF{o%<Opw;RS%]kX' );
define( 'AUTH_SALT',        'bBfYg;saSA_F*-iE[e~0&(AnB.Bi:^pxr,fD>+R<*9Ry+{#2K4_lrO5-T={pOJ0B' );
define( 'SECURE_AUTH_SALT', 'Sq$k%9+OPQ95L<Rti>Q|0ScADYk<U5k{is$hG/ $WrUjKTRnpF&S95!OL@)d,car' );
define( 'LOGGED_IN_SALT',   '`=VBR?yBkH);8GqyG]Tt$bb|!I/YK(n{9::-H$h<9YVS:U!79YeYH=Q+[LkEZU5E' );
define( 'NONCE_SALT',       'LgW1k$=KC:!n.UvjYc&)FqD=h 1=*6)8_f$}o%<@!ZwdOH(*bb8EN[WaS4bP`[m_' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
