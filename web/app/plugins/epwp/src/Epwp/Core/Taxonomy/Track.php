<?php

namespace Epwp\Core\Taxonomy;

class Track {
	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'addCustomTaxonomy' ] );
	}

	public function addCustomTaxonomy() {
		register_taxonomy( 'track', array( 'session' ), array(
			'hierarchical'          => false,
			'public'                => true,
			'show_in_nav_menus'     => true,
			'show_ui'               => true,
			'show_admin_column'     => false,
			'query_var'             => true,
			'rewrite'               => true,
			'capabilities'          => array(
				'manage_terms' => 'edit_posts',
				'edit_terms'   => 'edit_posts',
				'delete_terms' => 'edit_posts',
				'assign_terms' => 'edit_posts'
			),
			'labels'                => array(
				'name'                       => __( 'Tracks', 'YOUR-TEXTDOMAIN' ),
				'singular_name'              => _x( 'Track', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
				'search_items'               => __( 'Search tracks', 'YOUR-TEXTDOMAIN' ),
				'popular_items'              => __( 'Popular tracks', 'YOUR-TEXTDOMAIN' ),
				'all_items'                  => __( 'All tracks', 'YOUR-TEXTDOMAIN' ),
				'parent_item'                => __( 'Parent track', 'YOUR-TEXTDOMAIN' ),
				'parent_item_colon'          => __( 'Parent track:', 'YOUR-TEXTDOMAIN' ),
				'edit_item'                  => __( 'Edit track', 'YOUR-TEXTDOMAIN' ),
				'update_item'                => __( 'Update track', 'YOUR-TEXTDOMAIN' ),
				'add_new_item'               => __( 'New track', 'YOUR-TEXTDOMAIN' ),
				'new_item_name'              => __( 'New track', 'YOUR-TEXTDOMAIN' ),
				'separate_items_with_commas' => __( 'Tracks separated by comma', 'YOUR-TEXTDOMAIN' ),
				'add_or_remove_items'        => __( 'Add or remove tracks', 'YOUR-TEXTDOMAIN' ),
				'choose_from_most_used'      => __( 'Choose from the most used tracks', 'YOUR-TEXTDOMAIN' ),
				'not_found'                  => __( 'No tracks found.', 'YOUR-TEXTDOMAIN' ),
				'menu_name'                  => __( 'Tracks', 'YOUR-TEXTDOMAIN' ),
			),
			'show_in_rest'          => true,
			'rest_base'             => 'track',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
		) );
	}
}
