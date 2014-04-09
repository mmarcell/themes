<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '9:Rmh.{z(leQ:)[[=fsdxR;k.9.)ga;.kvZ>N>U,l_Jo}IORk9f=y.VT2U.K69@x');
define('SECURE_AUTH_KEY',  'JedgIZ5bce[}5+s8aNlruRgh;PaIkxT)h +92E{(@Kts|I]I032x!x~0#rv/0A):');
define('LOGGED_IN_KEY',    '~8%ZE^2#JLT6LxT.:m[piyD=E#`Ib7R^IU(cEGDlF?4c$-Z4|p{%2|E&a*Dm?yPV');
define('NONCE_KEY',        'w[G)0vZAAN}zp6QS*EKl.6R5(%x-:K{6iH(cz7kABh&x7oA2zKjn[&Ds_*@}Cgc.');
define('AUTH_SALT',        'Z]e+*Ab#;FOD>?30A@G**6FNI&~]a0,*i{hJcVd&k}T.7Vy;2:0&qJDkZe0Pg G!');
define('SECURE_AUTH_SALT', 'qyWZ:lk-8v]noO $6;.9YI2% j8KNLV2O~RgXGc*;,H:*xP)L({0s6O>~O}se1fZ');
define('LOGGED_IN_SALT',   '}).(GKB%B-]uOvSN)c]C{-:7=N3Du8:^{(SejO:J*T)Y8=D*HxPVwNxd.T9S/r+7');
define('NONCE_SALT',       'Ty^Ty<QJ7TNvL+rz0TgqC;m8oW!mx6?Sr[4ex#VXAAO@Jh*Slni#-w{@+j~H_TH2');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
