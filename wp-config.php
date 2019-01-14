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
define('DB_NAME', 'blogdb');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'cAzsSLk`;Nq}M+5=F-#t~ryyH E/:0J[LV;z8Jn+Erb#Ig&cr e[_tol$ArBQY3E');
define('SECURE_AUTH_KEY',  'lO)X#g?;=;0PHoiYy&o(0A=vIg&wuD,qi&GV$wgaeEJCp#{dt_C}Chz*Jm5eo?Vj');
define('LOGGED_IN_KEY',    '`7:g#;R3 WZ9XDni`[d0Oly2,hl0$!q~CT>;3mBUa(zm!hN$CxJB5m+o:+#K{Lid');
define('NONCE_KEY',        'CvhkD2]ARi8BKR5MK_rlHA|7KP?0l*V7W7~ASle4]GcILH%*(#[_(VU?l2a?a9Mj');
define('AUTH_SALT',        '@U8wJdcB)`|P@9UY.LgLb!(@`y:)PWZHXjhFC;JI5`R/!xtaC{ew9/8k^l1q!$/r');
define('SECURE_AUTH_SALT', 'V}zk$FU.X5wRyZ%C.Y)A_L9# *G:wKL$#.t,@*k)*X&j8mxQ$PqJb%D,S^I:7IN6');
define('LOGGED_IN_SALT',   'ze zw+F]LIFq&%yvKh_j.ISIt:NSB|tDyQ937v4--],n)Bp$%n@R6]=xuVP6(y1`');
define('NONCE_SALT',       'm]!Yp^5#<^qgI*FOxrk&IFU.nO/pu;E8+AvRq?+_X.UG5nFIoEG=G<#,g>X,_LT.');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
