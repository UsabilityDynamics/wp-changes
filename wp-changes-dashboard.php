<?php
/**
 * Plugin Name: Changes: Dashboard
 * Plugin URI: http://usabilitydynamics.com/
 * Description: Show changes.md on Dashboard.
 * Version: 0.5.0
 * Author: wpCloud.io
 * Author URI: http://wpcloud.io/
 * License: GPLv2 or later
 * Network: True
 * Domain Path: /static/locale/
 * Text Domain: wp-cloud
 *
 */

add_action('template_redirect', function() {
  //update_option( 'some-tthing', true );
  //die('dasf');
});

add_action('plugins_loaded', function() {

  require_once( __DIR__ . '/vendor/autoload.php' );

});

add_action('admin_menu', function() {


  add_dashboard_page( 'Changes', 'Changes', 'manage_options', 'changes', function() {

    if( !class_exists( 'Parsedown' ) ) {
      $Parsedown = new Parsedown();
    }

    echo '<div class="wrap">';
    echo '<h2>Changes</h2>';

    if( isset( $Parsedown ) ) {
      echo $Parsedown->text( file_get_contents( ABSPATH . '/changes.md' ));
    } else {
      echo "Missing Parsedown library.";
    }

    echo "</div>";

  });

});
