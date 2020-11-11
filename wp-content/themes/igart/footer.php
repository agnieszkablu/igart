<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package igart
 */
//ACF vars
// get menu by location.
$menu_name = 'footer';
$locations = get_nav_menu_locations();
$menu_id   = $locations[$menu_name];
$menu = wp_get_nav_menu_object($menu_id);

// modify primary only
if ($menu) {
  // vars
  $group_left_links = get_field('group_left_links', $menu);
  $group_right_links = get_field('group_right_links', $menu);
}
?>

</div><!-- #content -->

<footer class="footer pb-3">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-auto d-flex flex-column">
        <a class="nav-item" href="<?= $group_left_links['whatsapp_link']['url'] ?>"><span class="icon-whatsapp"></span><span><?= $group_left_links['whatsapp_link']['title'] ?></span></a>
        <a class="nav-item" href="<?= $group_left_links['instagram_link']['url'] ?>"><span class="icon-instagram"></span><span><?= $group_left_links['instagram_link']['title'] ?></span></a>
      </div>
      <div class="col-md-4 d-flex flex-column align-items-center">
        <a class="navbar-brand" href="/">
          <img data-no-lazy="1" src="<?= esc_url(get_template_directory_uri()); ?>/assets/images/igart.svg">
        </a>
      </div>
      <div class="col-auto d-flex flex-column">
        <a class="nav-item" href="<?= $group_right_links['email_link']['url'] ?>"><span class="icon-mail"></span><span><?= $group_right_links['email_link']['title'] ?></span></a>
        <a class="nav-item" href="<?= $group_right_links['fb_link']['url'] ?>"><span class="icon-facebook"></span><span><?= $group_right_links['fb_link']['title'] ?></span></a>
      </div>
    </div>
  </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>