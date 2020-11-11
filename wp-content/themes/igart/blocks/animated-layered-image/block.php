<?php
//vars

$image_1 = wp_get_attachment_image_src(block_field('image-base-layer', false), 'medium');
$image_1_alt = get_post_meta(block_field('image-base-layer', false), '_wp_attachment_image_alt', true);
$image_2 = wp_get_attachment_image_src(block_field('layer-1', false), 'medium');
$image_2_alt = get_post_meta(block_field('layer-1', false), '_wp_attachment_image_alt', true);
$image_3 = wp_get_attachment_image_src(block_field('layer-2', false), 'medium');
$image_3_alt = get_post_meta(block_field('layer-2', false), '_wp_attachment_image_alt', true);
$image_4 = wp_get_attachment_image_src(block_field('layer-3', false), 'medium');
$image_4_alt = get_post_meta(block_field('layer-3', false), '_wp_attachment_image_alt', true);

?>
<div class="layered-images-wrapper my-6">
  <?php if (!empty($image_1)) : ?>
    <img class="layer layer-base" src="<?= $image_1[0] ?>" alt="<?= $image_1_alt ?>" />
  <?php endif; ?>
  <?php if (!empty($image_2)) : ?>
    <img class="layer layer-1" src="<?= $image_2[0] ?>" alt="<?= $image_2_alt ?>" />
  <?php endif; ?>
  <?php if (!empty($image_3)) : ?>
    <img class="layer layer-2" src="<?= $image_3[0] ?>" alt="<?= $image_3_alt ?>" />
  <?php endif; ?>
  <?php if (!empty($image_4)) : ?>
    <img class="layer layer-3" src="<?= $image_4[0] ?>" alt="<?= $image_4_alt ?>" />
  <?php endif; ?>
</div>