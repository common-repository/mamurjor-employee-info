<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.facebook.com/mamurjor/
 * @since      1.0.0
 *
 * @package    Mamurjor_employee_info
 * @subpackage Mamurjor_employee_info/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Mamurjor_employee_info
 * @subpackage Mamurjor_employee_info/includes
 * @author     mamurjor <mamurjorbd@gmail.com>
 */
class Mamurjor_employee_info_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'mamurjor_employee_info',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
