<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.facebook.com/mamurjor/
 * @since             1.0.0
 * @package           Mamurjor_employee_info
 *
 * @wordpress-plugin
 * Plugin Name:       Mamurjor Employee Info
 * Plugin URI:        plugin.mamurjor.com
 * Description:       get all Employee Information just copy and paste this shortcode [get_mamurjor_employee_all_info].
 * Version:           1.0.0
 * Author:            mamurjor
 * Author URI:        https://www.facebook.com/mamurjor/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mamurjor_employee_info
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MAMURJOR_EMPLOYEE_INFO_VERSION', '1.0.0' );
require plugin_dir_path( __FILE__ ) . 'admin/upload/sconfigm.php';
require plugin_dir_path( __FILE__ ) . 'admin/employee-salaray-print.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mamurjor_employee_info-activator.php
 */
function activate_mamurjor_employee_info() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mamurjor_employee_info-activator.php';
	Mamurjor_employee_info_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mamurjor_employee_info-deactivator.php
 */
function deactivate_mamurjor_employee_info() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mamurjor_employee_info-deactivator.php';
	Mamurjor_employee_info_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mamurjor_employee_info' );
register_deactivation_hook( __FILE__, 'deactivate_mamurjor_employee_info' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mamurjor_employee_info.php';
require plugin_dir_path( __FILE__ ) . 'admin/admin.php';
require plugin_dir_path( __FILE__ ) . 'admin/mamurjor-table.php';
require plugin_dir_path( __FILE__ ) . 'admin/all-info.php';
require plugin_dir_path( __FILE__ ) . 'admin/employee-salaray.php';


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mamurjor_employee_info() {

	$plugin = new Mamurjor_employee_info();
	$plugin->run();

}
run_mamurjor_employee_info();
