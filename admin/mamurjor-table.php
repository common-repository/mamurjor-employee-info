<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	
global $wpdb;
$charset_collate = $wpdb->get_charset_collate();
$department_table_name=$wpdb->prefix.'mamurjor_department';
$sqldpt = "CREATE TABLE $department_table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  name Text DEFAULT '' NOT NULL, 
  PRIMARY KEY  (id)
) $charset_collate;";

if ($wpdb->get_var("SHOW TABLES LIKE '$department_table_name'") != $department_table_name) {
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sqldpt);
}
  
$designation_table_name=$wpdb->prefix.'mamurjor_designation';
$sqldesig = "CREATE TABLE $designation_table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  name Text DEFAULT '' NOT NULL, 
  PRIMARY KEY  (id)
) $charset_collate;";

if ($wpdb->get_var("SHOW TABLES LIKE '$designation_table_name'") != $designation_table_name) {
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sqldesig);
}



$sgrade_table_name=$wpdb->prefix.'mamurjor_sgrade';
$sqlsgrade = "CREATE TABLE $sgrade_table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  name Text DEFAULT '' NOT NULL, 
  basic Text DEFAULT '' NOT NULL, 
  PRIMARY KEY  (id)
) $charset_collate;";

if ($wpdb->get_var("SHOW TABLES LIKE '$sgrade_table_name'") != $sgrade_table_name) {
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sqlsgrade);
}


$emp_edu_table_name=$wpdb->prefix.'mamurjor_emp_edu';
$sqlempedu = "CREATE TABLE $emp_edu_table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  name Text DEFAULT '' NOT NULL, 
  result Text DEFAULT '' NOT NULL, 
  department Text DEFAULT '' NOT NULL, 
  passsingyear Text DEFAULT '' NOT NULL, 
  PRIMARY KEY  (id)
) $charset_collate;";

if ($wpdb->get_var("SHOW TABLES LIKE '$emp_edu_table_name'") != $emp_edu_table_name) {
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sqlempedu);
}

$employee_table_name=$wpdb->prefix.'mamurjor_employee';
$sqle = "CREATE TABLE $employee_table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  department_id mediumint(9) NOT NULL,
  designation_id mediumint(9) NOT NULL,
  sgrad_id mediumint(9) NOT NULL,
  edu_id mediumint(9) NOT NULL,
  name Text DEFAULT '' NOT NULL,
  national_id Text DEFAULT '' NOT NULL,
  cell Text DEFAULT '' NOT NULL,
  email Text DEFAULT '' NOT NULL,
  photo Text DEFAULT '' NOT NULL,
    
  PRIMARY KEY  (id)
) $charset_collate;";

if ($wpdb->get_var("SHOW TABLES LIKE '$employee_table_name'") != $employee_table_name) {
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sqle);
}

?>