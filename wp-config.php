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
define( 'DB_NAME', 'converge' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         '9mYW4zzzrw@|-AKuWp|#T4HLVal5|D$I`.DZO0.cAnUI.SsF)~eu.v9Y)TrnFs_o' );
define( 'SECURE_AUTH_KEY',  'uz18q,9d9.SbX3}Keh{.y[I8X~jF>10,d5P|xL+B0>tbh[@bw5)t+tRh,PV==t>@' );
define( 'LOGGED_IN_KEY',    'lI:ziD++vl;/W:EE<sa+>%coPFZvR=cF}+W56,API(3Ni(l4t4BQli@inuxKqh;m' );
define( 'NONCE_KEY',        '-g^UoY+CQ/:$j_n43+|OIpOb!(e 0zBLl=7ImVvPg>9?]Mdwi0Bpwg6sxr<^_QS$' );
define( 'AUTH_SALT',        'LKg`!J|W2a_|5wt>W?p%5H Gc?:Ej9L?bX>E34OG6yde2<@ILoWT7koyw,a,&<zs' );
define( 'SECURE_AUTH_SALT', 'G:_jfw&ML@eF9pRkN HGWUd#N:SD]flQ;~5hNAjV-RXUGl8J7;;A)[~1m:f >]V?' );
define( 'LOGGED_IN_SALT',   '>R}<U6!&1sQDit;xaqK)A~P2n|%f>GUgSk}SFYm8sm]tfsuyWhx1Svs*ec)<V=h%' );
define( 'NONCE_SALT',       'A!V5(#)3KoG@kz<]S,oKhm+C@u0OUkr@~[F#Km=CGMB^3<C=9QcCSjoXRv)jW0+a' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ftw_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
