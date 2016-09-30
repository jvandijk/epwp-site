<?php

namespace Epwp\Core\Action;

class Session {
	public function __construct() {
		add_action( 'pre_get_posts', [ $this, 'integrateElasticPress' ] );

	}

	public function integrateElasticPress( $query ) {
		// Lets make sure this doesn't interfere with the CLI
		if ( defined( 'WP_CLI' ) && WP_CLI ) {
			return;
		}

		if ( ! $query->is_main_query() || $query->is_single() ) {
			return;
		}

		$post_type = $query->get( 'post_type' );

		if ( $post_type === 'session' ) {
			$query->set( 'ep_integrate', true );
		}
	}
}
