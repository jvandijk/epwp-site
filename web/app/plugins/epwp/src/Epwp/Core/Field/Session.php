<?php

namespace Epwp\Core\Field;

class Session {
	public function __construct() {
		add_action( 'init', [ $this, 'addCustomFields' ] );
	}

	public function addCustomFields() {
		if ( function_exists( "register_field_group" ) ) {
			register_field_group( array(
				'id'         => 'acf_session-meta',
				'title'      => 'Session meta',
				'fields'     => array(
					array(
						'key'            => 'field_57e12575e6d5d',
						'label'          => 'Date',
						'name'           => 'date',
						'type'           => 'date_picker',
						'date_format'    => 'yymmdd',
						'display_format' => 'dd/mm/yy',
						'first_day'      => 1,
					),
					array(
						'key'               => 'field_57e1266414939',
						'label'             => 'Start time',
						'name'              => 'start_time',
						'type'              => 'date_time_picker',
						'show_date'         => 'false',
						'date_format'       => '',
						'time_format'       => 'HH:mm',
						'show_week_number'  => 'false',
						'picker'            => 'select',
						'save_as_timestamp' => 'true',
						'get_as_timestamp'  => 'false',
					),
					array(
						'key'               => 'field_57e126a31493a',
						'label'             => 'End time',
						'name'              => 'end_time',
						'type'              => 'date_time_picker',
						'show_date'         => 'false',
						'date_format'       => '',
						'time_format'       => 'HH:mm',
						'show_week_number'  => 'false',
						'picker'            => 'select',
						'save_as_timestamp' => 'true',
						'get_as_timestamp'  => 'false',
					),
					array(
						'key'             => 'field_57e12982b65f1',
						'label'           => 'Speakers',
						'name'            => 'speakers',
						'type'            => 'relationship',
						'return_format'   => 'id',
						'post_type'       => array(
							0 => 'speaker',
						),
						'taxonomy'        => array(
							0 => 'all',
						),
						'filters'         => array(
							0 => 'search',
						),
						'result_elements' => array(
							0 => 'featured_image',
							1 => 'post_title',
						),
						'max'             => '',
					),
				),
				'location'   => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'session',
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
