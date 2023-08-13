<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package converge_theme
 */

// Retrieve the logo from the theme settings
$settings = get_option('theme_settings');
$logo_url = isset($settings['logo']) ? esc_attr($settings['logo']) : '';
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo("charset"); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <?php wp_head(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/main.css" rel="stylesheet">
  <title> <?php wp_title("|", true, "right"); ?> </title>
</head>
<body <?php body_class(); ?>>
  <div id="wrap">
    <header class="site-header">
      <div class="desktop-header">
        <div class="row">
          <div class="logo col-4">

            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php if ($logo_url) : ?>
                  <img src="<?php echo esc_url($logo_url); ?>" alt="Site Logo">
                <?php else : ?>
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/nav-top-logo-converge.png' ); ?>" alt="Site Logo">
                <?php endif; ?>
            </a>
          </div>
          <div class="menu col-8">
            <nav class="main-menu">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary-menu', // Change this to your menu location
                        'menu_class' => 'menu',
                    ) );
                ?>
            </nav>
          </div>
        </div>
      </div>
      <div class="mobile-header">
        <div class="container">
          <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php if ($logo_url) : ?>
                  <img src="<?php echo esc_url($logo_url); ?>" alt="Site Logo">
                <?php else : ?>
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/nav-top-logo-converge.png' ); ?>" alt="Site Logo">
                <?php endif; ?>
            </a>
          </div>
        </div>
      </div>
    </header>
    <main>
