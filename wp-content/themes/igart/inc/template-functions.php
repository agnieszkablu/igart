<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package igart
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function igart_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'igart_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function igart_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'igart_pingback_header' );

/**
 * SVG Image Helper Filter
 *
 * Filter to get SVG width and height params
 *
 */

add_filter('wp_get_attachment_image_src', 'fix_wp_get_attachment_image_svg', 10, 4);  /* the hook */

function fix_wp_get_attachment_image_svg($image, $attachment_id, $size, $icon)
{
  if (is_array($image) && preg_match('/\.svg$/i', $image[0]) && $image[1] <= 1) {
    if (is_array($size)) {
      $image[1] = $size[0];
      $image[2] = $size[1];
    } elseif (($xml = simplexml_load_file($image[0])) !== false) {
      $attr = $xml->attributes();
      $viewbox = explode(' ', $attr->viewBox);
      $image[1] = isset($attr->width) && preg_match('/\d+/', $attr->width, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[2] : null);
      $image[2] = isset($attr->height) && preg_match('/\d+/', $attr->height, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[3] : null);
    } else {
      $image[1] = $image[2] = null;
    }
  }
  return $image;
}
