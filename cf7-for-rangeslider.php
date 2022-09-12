<?php
/**
* Plugin Name: Range Slider Field for Contact Form 7
* Description: This plugin allows create Range Slider Field for Contact Form 7 plugin.
* Version: 1.0
* Copyright: 2022
* Text Domain: range-slider-field-for-contact-form-7
* Domain Path: /languages 
*/

if (!defined('ABSPATH')) {
    die('-1');
}

if (!defined('RSFFCF7_PLUGIN_DIR')) {
    define('RSFFCF7_PLUGIN_DIR',plugins_url('', __FILE__));
}

include_once('main/backend/rsffcf7-backend.php');
include_once('main/resource/rsffcf7-installation-require.php');
include_once('main/resource/rsffcf7-language.php');
include_once('main/resource/rsffcf7-load-js-css.php');
     

    	
     
        
