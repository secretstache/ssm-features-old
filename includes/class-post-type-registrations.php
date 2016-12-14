<?php
/**
 * SSM Features
 *
 * @package   SSM_Features
 * @license   GPL-2.0+
 */

/**
 * Register post types and taxonomies.
 *
 * @package SSM_Features
 */
class SSM_Features_Registrations {

	public $post_type = 'feature';

	// public $taxonomies = array( 'service-category' );

	public function init() {
		// Add the SSM Features and taxonomies
		add_action( 'init', array( $this, 'register' ) );
	}

	/**
	 * Initiate registrations of post type and taxonomies.
	 *
	 * @uses SSM_Features_Registrations::register_post_type()
	 * @uses SSM_Features_Registrations::register_taxonomy_category()
	 */
	public function register() {
		$this->register_post_type();
		$this->register_taxonomy_category();
	}

	/**
	 * Register the custom post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	protected function register_post_type() {
		$labels = array(
			'name'               => __( 'Features', 'ssm-features' ),
			'singular_name'      => __( 'Feature', 'ssm-features' ),
			'add_new'            => __( 'Add Feature', 'ssm-features' ),
			'add_new_item'       => __( 'Add Feature', 'ssm-features' ),
			'edit_item'          => __( 'Edit Feature', 'ssm-features' ),
			'new_item'           => __( 'New Feature', 'ssm-features' ),
			'view_item'          => __( 'View Feature', 'ssm-features' ),
			'search_items'       => __( 'Search Features', 'ssm-features' ),
			'not_found'          => __( 'No features found', 'ssm-features' ),
			'not_found_in_trash' => __( 'No features in the trash', 'ssm-features' ),
			'featured_image'			=>	__( 'Feature Icon', 'ssm-features' ),
			'set_featured_image'			=>	__( 'Set Feature Icon', 'ssm-features' ),
			'remove_featured_image'			=>	__( 'Remove Feature Icon', 'ssm-features' ),
			'use_featured_image'			=>	__( 'Use as Feature Icon', 'ssm-features' ),
		);

		$supports = array(
			'title',
			'thumbnail'
		);

		$args = array(
			'labels'          		=> $labels,
			'supports'        		=> $supports,
			'public'          		=> false,
			'capability_type' 		=> 'page',
			'publicly_queriable'	=> true,
			'show_ui' 						=> true,
			'show_in_nav_menus' 	=> false,
			'rewrite'         		=> false,
			'menu_position'   		=> 30,
			'menu_icon'       		=> 'dashicons-admin-customizer',
			'has_archive'					=> false,
			'exclude_from_search'	=> true
		);

		$args = apply_filters( 'SSM_Features_args', $args );

		register_post_type( $this->post_type, $args );
	}

	/**
	 * Register a taxonomy for Project Categories.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	protected function register_taxonomy_category() {
		$labels = array(
			'name'                       => __( 'Feature Categories', 'ssm-features' ),
			'singular_name'              => __( 'Feature Category', 'ssm-features' ),
			'menu_name'                  => __( 'Categories', 'ssm-features' ),
			'edit_item'                  => __( 'Edit Service Category', 'ssm-features' ),
			'update_item'                => __( 'Update Category', 'ssm-features' ),
			'add_new_item'               => __( 'Add New Category', 'ssm-features' ),
			'new_item_name'              => __( 'New Category Name', 'ssm-features' ),
			'parent_item'                => __( 'Parent Category', 'ssm-features' ),
			'parent_item_colon'          => __( 'Parent Category:', 'ssm-features' ),
			'all_items'                  => __( 'All Categories', 'ssm-features' ),
			'search_items'               => __( 'Search Categories', 'ssm-features' ),
			'popular_items'              => __( 'Popular Categories', 'ssm-features' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'ssm-features' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'ssm-features' ),
			'choose_from_most_used'      => __( 'Choose from the most used categories', 'ssm-features' ),
			'not_found'                  => __( 'No categories found.', 'ssm-features' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => true,
			'rewrite'           => array( 'slug' => 'feature-category' ),
			'show_admin_column' => true,
			'query_var'         => true,
		);

		$args = apply_filters( 'SSM_Features_category_args', $args );

		register_taxonomy( $this->taxonomies[0], $this->post_type, $args );
	}
}