<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'rosenfield' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '85V`32+CTpofyk!bIgQ`Z[O=7i1Ih>#?;<e3dyGE]&,8@O3(csdSRr6B1:3_<6K#' );
define( 'SECURE_AUTH_KEY',  '|?19`gUHA%+q?XOiiDU`_;+E)nvy+6>S1sug%`#:]>?Mu5{-(?.O={c7H6g?b1uq' );
define( 'LOGGED_IN_KEY',    '|~>Fc5%dJP-.?DrvfaC4ub-d!l)Z3&$vG?ztEeKX;+fN{?3jSMGwxIK|9sQ+3@nU' );
define( 'NONCE_KEY',        '$!qBd$g%:E5j1Sbv9qxw:IJL,utK@o`jO!dqK3^EhT_QcpmvHu!Yj y}eEmIxu%y' );
define( 'AUTH_SALT',        '.#*sN]5+;k$WsVmy-VoRYtf&yt;UuA`&I;cZNLzy/0>r!jk];3&me`@zGh={1Sc,' );
define( 'SECURE_AUTH_SALT', 'W2{7.dPamPCsEU2vQlje/9KI*p!AbO)2Q#Dl@ugRgz>Lu{%CZ|EB+^3W&-4#bJYz' );
define( 'LOGGED_IN_SALT',   '$#Lhqm%hlW|ft5V+u(iPjl[6z)LYBNs+?@ZMkd&BXZ?S5mOuz<$=lAy074: ajNN' );
define( 'NONCE_SALT',       '/C*s@{rUPfTGVMp*hQt6g.VkeWUFF;m|nkm,c-#k9@)6>iF7 %m}I]_;f?wupR1F' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'dr_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
