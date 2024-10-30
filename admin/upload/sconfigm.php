<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	
global $wpdb;
$charset_collate = $wpdb->get_charset_collate();
$monthly_salary_table_name=$wpdb->prefix.'monthly_salary';
$sqlsalary = "CREATE TABLE $monthly_salary_table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  monthname Text DEFAULT '' NOT NULL, 
  basic Text DEFAULT '' NOT NULL, 
  additional Text DEFAULT '' NOT NULL, 
  subtraction Text DEFAULT '' NOT NULL, 
  name Text DEFAULT '' NOT NULL, 
  cell Text DEFAULT '' NOT NULL, 
  department_id Text DEFAULT '' NOT NULL, 
  designation_id Text DEFAULT '' NOT NULL, 
  sgrad_id Text DEFAULT '' NOT NULL, 
  national_id Text DEFAULT '' NOT NULL, 
  year Text DEFAULT '' NOT NULL, 
  PRIMARY KEY  (id)
) $charset_collate;";

if ($wpdb->get_var("SHOW TABLES LIKE '$monthly_salary_table_name'") != $monthly_salary_table_name) {
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sqlsalary);
}


?>