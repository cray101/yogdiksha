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
define('DB_NAME', 'wpyogdiksha_nov13');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'b6g@hq#L00*}+:#Se|xy+1hEHauMfo&Qz(}H,oO09LE LX<kKn,yX#<ZM]XEBWo0');
define('SECURE_AUTH_KEY',  ',mxkz<b[_VU%[!<a@</?q!0ZUiJIhu_(E,[=xM>g>YfkRZ~:L0E0CJ$-;N6Q}cD;');
define('LOGGED_IN_KEY',    'G_FB|1-+@O}[7%+THfx+A[^bJ@EO-xhScjHXGb9c;fJp9dV60^1~qNfukuiZg&p|');
define('NONCE_KEY',        '?mDMkA||SxsjqT>k;Z|+};km&:DqR~+>e+%7b`M8byJ9&e1uWWM5_1FwCA/L6S^d');
define('AUTH_SALT',        'PaH-H9$fh8Du-uW}](_d*&7mc]X%%4XC+7H>t!f*M7G2a-AzRlf15B3FIZKCy@+F');
define('SECURE_AUTH_SALT', 'gE4e&r@J  ;3fH!hOBCX>^t-u,L_T{Fg[<Tvlq**3& $=w> WFN9R&sX/,,m,HIE');
define('LOGGED_IN_SALT',   'Wj.EWMT|bH5?A8z=@qZ|Y@X5e|>|WTNgB:nV4NN;H4H:Y{kto5zd0>/8yg;$*+`)');
define('NONCE_SALT',       '|$-(!^IT;*52k<%/zw% InC#Eac4-W3X}<-8M*--[tQW2D#$TQAFc}Gf.>;[wv#8');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpydnov_';

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
