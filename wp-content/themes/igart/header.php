<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package igart
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= esc_url(get_template_directory_uri()); ?>/assets/images/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= esc_url(get_template_directory_uri()); ?>/assets/images/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= esc_url(get_template_directory_uri()); ?>/assets/images/favicons/favicon-16x16.png">
  <meta name="msapplication-TileColor" content="#ff5e31">
  <meta name="theme-color" content="#ff5e31">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <a class="sr-only sr-only-focusable" href="#content"><?php esc_html_e('Skip to content', 'igart'); ?></a>

    <header id="masthead" class="site-header">
      <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container container-xl">
          <?php
          the_custom_logo();
          ?>
          <a class="navbar-brand nav-default" href="/">
            <img data-no-lazy="1" src="<?= esc_url(get_template_directory_uri()); ?>/assets/images/logo.svg">
          </a>
          <?php get_template_part('template-parts/menu', 'primary'); ?>
        </div>
      </nav>
    </header><!-- #masthead -->

    <div id="content" class="site-content">