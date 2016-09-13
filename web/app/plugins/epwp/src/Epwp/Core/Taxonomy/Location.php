<?php

namespace Epwp\Core\Taxonomy;

class Location {
	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'addCustomTaxonomy' ] );
	}

	public function addCustomTaxonomy() {
		register_taxonomy( 'location', array( 'session' ), array(
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
				'name'                       => __( 'Locations', 'YOUR-TEXTDOMAIN' ),
				'singular_name'              => _x( 'Location', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
				'search_items'               => __( 'Search locations', 'YOUR-TEXTDOMAIN' ),
				'popular_items'              => __( 'Popular locations', 'YOUR-TEXTDOMAIN' ),
				'all_items'                  => __( 'All locations', 'YOUR-TEXTDOMAIN' ),
				'parent_item'                => __( 'Parent location', 'YOUR-TEXTDOMAIN' ),
				'parent_item_colon'          => __( 'Parent location:', 'YOUR-TEXTDOMAIN' ),
				'edit_item'                  => __( 'Edit location', 'YOUR-TEXTDOMAIN' ),
				'update_item'                => __( 'Update location', 'YOUR-TEXTDOMAIN' ),
				'add_new_item'               => __( 'New location', 'YOUR-TEXTDOMAIN' ),
				'new_item_name'              => __( 'New location', 'YOUR-TEXTDOMAIN' ),
				'separate_items_with_commas' => __( 'Locations separated by comma', 'YOUR-TEXTDOMAIN' ),
				'add_or_remove_items'        => __( 'Add or remove locations', 'YOUR-TEXTDOMAIN' ),
				'choose_from_most_used'      => __( 'Choose from the most used locations', 'YOUR-TEXTDOMAIN' ),
				'not_found'                  => __( 'No locations found.', 'YOUR-TEXTDOMAIN' ),
				'menu_name'                  => __( 'Locations', 'YOUR-TEXTDOMAIN' ),
			),
			'show_in_rest'          => true,
			'rest_base'             => 'location',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
		) );
	}
}
