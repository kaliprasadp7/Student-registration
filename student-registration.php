<?php
/**
 * Plugin Name: Student Registration
 * Plugin URI: https://webdisk.info/blog
 * Description: A simple student registration management plugin.
 * Author: Kali Prasad Panda
 * Author URI: https://webdisk.info
 * Version: 1.0.0
 * Text Domain: Student-registration  echo ; 
*/

if(!defined('ABSPATH'))
{
    //echo "what you want to do?";
   exit;
}

register_activation_hook( __FILE__, 'myPluginCreateTable');
function myPluginCreateTable() {
  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();
  $student_reg = $wpdb->prefix . 'customtable';
  //create table after activating the plugin
  $sql = "CREATE TABLE `wordpress`.`student_reg` ( `sln` INT(6) NOT NULL AUTO_INCREMENT , `firstname` VARCHAR(20) NOT NULL , `lastname` VARCHAR(20) NOT NULL , `fathername` VARCHAR(30) NOT NULL , `address` TEXT NOT NULL , `mobile` VARCHAR(10) NOT NULL , `email` VARCHAR(30) NOT NULL , `time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`sln`)) ENGINE = InnoDB;";
  if ($wpdb->get_var("SHOW TABLES LIKE 'student_reg'") != $student_reg) {
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
  }
}

	
register_deactivation_hook( __FILE__, 'deactivate_table' );

function deactivate_table(){
    global $wpdb;
    //drop table after deacting the plugin
    $wpdb->query("DROP table IF Exists student_reg");
}



define( 'PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
define('PLUGIN_URL', plugins_url());
define('PLUGIN_ADMIN_URL', admin_url());




function wpbootstrap_enqueue_styles() {
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css' );
    wp_enqueue_style( 'my-style', plugins_url().'/student-registration/views/css/style.css');
    wp_enqueue_script('bootstrap-script','https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js');
}
add_action('admin_enqueue_scripts', 'wpbootstrap_enqueue_styles');



function add_my_custom_menu() {
  add_menu_page( 'Student-registration',//page-title
 'Student Registration',// menu-title
 'manage_options',//capabilities (user level access) 
 'student-registration',// slug
 'custom_admin_view', //call back function
 'dashicons-media-default', //icon url
  6 //position 
);

add_submenu_page(
    'student-registration', //parent slug
    'Dashboard', //page title
    'Dashboard', //menu title
    'manage_options',//capabilities
    'student-registration',//menu slug
    'custom_admin_view'//callback function
);

add_submenu_page(
    'student-registration', //parent slug
    'Add new', //page title
    'Add new', //menu title
    'manage_options',//capabilities
    'addnew',//menu slug
    'add_new_student'//callback function
);

add_submenu_page(
    'student-registration', //parent slug
    'View', //page titlehttps://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.cs
    'View', //menu title
    'manage_options',//capabilities
    'view',//menu slug
    'view_page'//callback function
);

add_submenu_page(
    'student-registration', //parent slug
    'Edit', //page title
    'Edit', //menu title
    'manage_options',//capabilities
    'edit',//menu slug
    'edit_page'//callback function
);

}

add_action('admin_menu', 'add_my_custom_menu');

function custom_admin_view(){
 //for dashboard
 include_once PLUGIN_DIR_PATH."/views/dashboard.php";
}

function add_new_student(){
    //for add new page
 include_once PLUGIN_DIR_PATH."/views/addnew.php";
    
}

function view_page(){
    //for view page
 include_once PLUGIN_DIR_PATH."/views/view.php";
    
}

function edit_page(){
    //for edit page
 include_once PLUGIN_DIR_PATH."/views/edit.php";
    
}


?>
