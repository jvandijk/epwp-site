<?php

namespace Epwp\Core\Post;

class Session {
	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'addCustomPostType' ] );
		add_filter( 'post_updated_messages', [ $this, 'updateMessages' ] );
	}

	public function addCustomPostType() {
		register_post_type( 'session', array(
			'labels'                => array(
				'name'               => __( 'Sessions', 'YOUR-TEXTDOMAIN' ),
				'singular_name'      => __( 'Session', 'YOUR-TEXTDOMAIN' ),
				'all_items'          => __( 'All Sessions', 'YOUR-TEXTDOMAIN' ),
				'new_item'           => __( 'New session', 'YOUR-TEXTDOMAIN' ),
				'add_new'            => __( 'Add New', 'YOUR-TEXTDOMAIN' ),
				'add_new_item'       => __( 'Add New session', 'YOUR-TEXTDOMAIN' ),
				'edit_item'          => __( 'Edit session', 'YOUR-TEXTDOMAIN' ),
				'view_item'          => __( 'View session', 'YOUR-TEXTDOMAIN' ),
				'search_items'       => __( 'Search sessions', 'YOUR-TEXTDOMAIN' ),
				'not_found'          => __( 'No sessions found', 'YOUR-TEXTDOMAIN' ),
				'not_found_in_trash' => __( 'No sessions found in trash', 'YOUR-TEXTDOMAIN' ),
				'parent_item_colon'  => __( 'Parent session', 'YOUR-TEXTDOMAIN' ),
				'menu_name'          => __( 'Sessions', 'YOUR-TEXTDOMAIN' ),
			),
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => array( 'title', 'editor', 'excerpt', 'revisions' ),
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_icon'             => 'dashicons-admin-post',
			'show_in_rest'          => true,
			'rest_base'             => 'session',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		) );
	}

	public function updateMessages( $messages ) {
		global $post;

		$permalink = get_permalink( $post );

		$messages['session'] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => sprintf( __( 'Session updated. <a target="_blank" href="%s">View session</a>', 'YOUR-TEXTDOMAIN' ), esc_url( $permalink ) ),
			2  => __( 'Custom field updated.', 'YOUR-TEXTDOMAIN' ),
			3  => __( 'Custom field deleted.', 'YOUR-TEXTDOMAIN' ),
			4  => __( 'Session updated.', 'YOUR-TEXTDOMAIN' ),
			/* translators: %s: date and time of the revision */
			5  => isset( $_GET['revision'] ) ? sprintf( __( 'Session restored to revision from %s', 'YOUR-TEXTDOMAIN' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => sprintf( __( 'Session published. <a href="%s">View session</a>', 'YOUR-TEXTDOMAIN' ), esc_url( $permalink ) ),
			7  => __( 'Session saved.', 'YOUR-TEXTDOMAIN' ),
			8  => sprintf( __( 'Session submitted. <a target="_blank" href="%s">Preview session</a>', 'YOUR-TEXTDOMAIN' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
			9  => sprintf( __( 'Session scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview session</a>', 'YOUR-TEXTDOMAIN' ),
				// translators: Publish box date format, see http://php.net/date
				date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
			10 => sprintf( __( 'Session draft updated. <a target="_blank" href="%s">Preview session</a>', 'YOUR-TEXTDOMAIN' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		);

		return $messages;
	}
}
