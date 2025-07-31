<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div id="container">
<header role="banner">
  <div class="site-title">
    <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
    <h2><?php bloginfo('description'); ?></h2>
  </div>

  <button id="menu-toggle" aria-controls="primary-menu" aria-expanded="false">☰ Menu</button>

  <nav role="navigation" id="site-navigation">
    <?php wp_nav_menu(['theme_location' => 'primary', 'menu_id' => 'primary-menu']); ?>
  </nav>
</header>

