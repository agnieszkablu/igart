<?php
//vars
$image_1 = wp_get_attachment_image_src(block_field('image', false), 'medium');
$image_1_alt = get_post_meta(block_field('image', false), '_wp_attachment_image_alt', true);
$title_1 = block_field('title', false);
$link_1 = block_field('link', false);
$image_2 = wp_get_attachment_image_src(block_field('image-2', false), 'medium');
$image_2_alt = get_post_meta(block_field('image-2', false), '_wp_attachment_image_alt', true);
$title_2 = block_field('title-2', false);
$link_2 = block_field('link-2', false);
$image_3 = wp_get_attachment_image_src(block_field('image-3', false), 'medium');
$image_3_alt = get_post_meta(block_field('image-3', false), '_wp_attachment_image_alt', true);
$title_3 = block_field('title-3', false);
$link_3 = block_field('link-3', false);
?>
<div class="section-three-col row mt-6 mb-3">
  <div class="col-sm-6 col-lg-4 mb-3">
    <div class="grid-item embed-responsive embed-responsive-1by1">
      <div class="grid-content embed-responsive-item">
        <?php if (!empty($image_1)) : ?>
          <img class="stretch-image" src="<?= $image_1[0] ?>" alt="<?= $image_1_alt ?>" />
        <?php endif; ?>
        <?php if (!empty($title_1)) : ?>
          <h3><?= $title_1 ?></h3>
        <?php endif; ?>
        <?php if (!empty($link_1)) : ?>
          <a class="link-to-all" href="<?= $link_1 ?>"></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-4 mb-3">
    <div class="grid-item embed-responsive embed-responsive-1by1">
      <div class="grid-content embed-responsive-item">
        <?php if (!empty($image_2)) : ?>
          <img class="stretch-image" src="<?= $image_2[0] ?>" alt="<?= $image_2_alt ?>" />
        <?php endif; ?>
        <?php if (!empty($title_2)) : ?>
          <h3><?= $title_2 ?></h3>
        <?php endif; ?>
        <?php if (!empty($link_2)) : ?>
          <a class="link-to-all" href="<?= $link_2 ?>"></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-4 mb-3">
    <div class="grid-item embed-responsive embed-responsive-1by1">
      <div class="grid-content embed-responsive-item">
        <?php if (!empty($image_3)) : ?>
          <img class="stretch-image" src="<?= $image_3[0] ?>" alt="<?= $image_3_alt ?>" />
        <?php endif; ?>
        <?php if (!empty($title_3)) : ?>
          <h3><?= $title_3 ?></h3>
        <?php endif; ?>
        <?php if (!empty($link_3)) : ?>
          <a class="link-to-all" href="<?= $link_3 ?>"></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>