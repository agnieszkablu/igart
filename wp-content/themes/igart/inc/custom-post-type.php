<?php

class Custom_Post_Type
{

  function __construct()
  {
    add_action('init', array($this, 'register_offer'), 999);
  }

  //
  // Offer
  //
  function register_offer()
  {
    $labels = array(
      'name'              => 'Offer Category',
      'search_items'      => 'Search Categories',
      'all_items'         => 'All Categories',
      'edit_item'         => 'Edit Category',
      'update_item'       => 'Update Category',
      'add_new_item'      => 'Add New Category',
      'new_item_name'     => 'New Category Name',
      'menu_name'         => 'Categories',
    );
    $category_args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'public'            => true,
      'query_var'         => true,
      'show_in_rest' => true
    );

    register_taxonomy('offer-category', array('offer'), $category_args);

    $supports = array(
      'title',
      'custom-fields',
      'editor',
      'thumbnail',
      'revisions',
      'author',
      'excerpt'
    );

    $args = array(
      'labels'      => array(
        'name'          => __('Oferta'),
        'singular_name' => __('Oferta')
      ),
      'menu_icon'   => 'dashicons-clipboard',
      'public'      => true,
      'has_archive' => false,
      'rewrite'     => array("slug" => "offer", "with_front" => false, "hierarchical" => true),
      'supports' => $supports,
      'hierarchical' => true,
      'show_in_rest' => true
    );

    register_post_type('offer', $args);
  }

}

new Custom_Post_Type();
