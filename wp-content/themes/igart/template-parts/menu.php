<?php

/**
 * The template for displaying the footer on CPT Landings
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage igart
 */
?>
<div class="nav-default collapse navbar-collapse nav-offcanvas" id="navbar">
  <div class="nav-offcanvas-inner d-lg-flex align-items-lg-center">
    <?php
    wp_nav_menu(array(
      'container'      => false,
      'theme_location' => 'primary',
      'menu_class'     => 'navbar-nav nav-default',
      'depth'          => 2,
      'fallback_cb'    => 'bs4navwalker::fallback',
      'walker'         => new bs4navwalker()
    ));
    ?>
  </div>
</div>
<button class="nav-default navbar-toggler navbar-toggler-right" type="button" data-toggle="offcanvas" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
  <div class="menu-toggler">
    <span class="menu-toggler-line line-1"></span>
    <span class="menu-toggler-line line-2"></span>
    <span class="menu-toggler-line line-3"></span>
  </div>
</button>