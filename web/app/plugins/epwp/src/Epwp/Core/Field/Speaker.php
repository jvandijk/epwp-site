<?php

namespace Epwp\Core\Field;

class Speaker {
	public function __construct() {
		add_action( 'init', [ $this, 'addCustomFields' ] );
	}

	public function addCustomFields() {
		if ( function_exists( "register_field_group" ) ) {
			register_field_group( array(
				'id'         => 'acf_speaker-meta',
				'title'      => 'Speaker meta',
				'fields'     => array(
					array(
						'key'           => 'field_57e0f96ef969e',
						'label'         => 'Twitter',
						'name'          => 'twitter',
						'type'          => 'text',
						'default_value' => '',
						'placeholder'   => 'twitter',
						'prepend'       => '',
						'append'        => '',
						'formatting'    => 'html',
						'maxlength'     => '',
					),
					array(
						'key'           => 'field_57e0f9c71587c',
						'label'         => 'LinkedIn',
						'name'          => 'linkedin',
						'type'          => 'text',
						'default_value' => '',
						'placeholder'   => 'linkedin',
						'prepend'       => '',
						'append'        => '',
						'formatting'    => 'html',
						'maxlength'     => '',
					),
				),
				'location'   => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'speaker',
							'order_no' => 0,
							'group_no' => 0,
						),
					),
				),
				'options'    => array(
					'position'       => 'normal',
					'layout'         => 'default',
					'hide_on_screen' => array(),
				),
				'menu_order' => 0,
			) );
		}

	}
}
