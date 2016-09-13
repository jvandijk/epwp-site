<?php

namespace Epwp;

use Epwp\Core\Post\Speaker,
	Epwp\Core\Post\Session,
	Epwp\Core\Taxonomy\Track,
	Epwp\Core\Taxonomy\Location;

class Bootstrap {
	protected static $instance;
	protected $extend = [];

	protected function __construct() {
		// register plugin autoloader
		spl_autoload_register( [ $this, 'autoload' ] );

		// Register activation/deactivation hooks
		register_activation_hook( __FILE__, [ $this, 'activatePlugin' ] );
		register_deactivation_hook( __FILE__, [ $this, 'deactivatePlugin' ] );

		add_action( 'plugins_loaded', [ $this, 'initCore' ], 100 );
	}

	/**
	 * Get the singleton instance of this class
	 *
	 * @return object
	 */
	public static function getInstance() {
		if ( ! ( self::$instance instanceof self ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Setup a PSR4 autoloader for demo purposes
	 *
	 * @param $class
	 */
	public function autoload( $class ) {
		$file = strtr( $class, '\\', DIRECTORY_SEPARATOR ) . '.php';
		$path = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . $file;
		if ( file_exists( $path ) ) {
			require $path;

			return;
		}
	}

	public function activatePlugin() {

	}

	public function deactivatePlugin() {

	}

	public function initCore() {
		$this->extend['core-post-speaker']      = new Speaker();
		$this->extend['core-post-session']      = new Session();
		$this->extend['core-taxonomy-track']    = new Track();
		$this->extend['core-taxonomy-location'] = new Location();
	}
}
