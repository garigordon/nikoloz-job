<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Pciwgas_Script {
	
	function __construct() {
		
		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array($this, 'pciwgas_front_style') );
		
		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array($this, 'pciwgas_front_script') );
		
		// Action to add style in backend
		add_action( 'admin_enqueue_scripts', array($this, 'pciwgas_admin_style') );
		
		// Action to add script at admin side
		add_action( 'admin_enqueue_scripts', array($this, 'pciwgas_admin_script') );
		
		
	}

	/**
	 * Function to add style at front side
	 * 
	 * @package Post Category Image With Grid and Slider
	 * @since 1.0.0
	 */
	function pciwgas_front_style() {		
		wp_register_style( 'pciwgas-publlic-style', PCIWGAS_URL.'assets/css/categoryimage-public.css', null, PCIWGAS_VERSION );
			wp_enqueue_style( 'pciwgas-publlic-style' );
		
	}
	
	/**
	 * Function to add script at front side
	 * 
	 * @package Post Category Image With Grid and Slider
	 * @since 1.0.0
	 */
	function pciwgas_front_script() {

		// Registring slick slider script
		if( !wp_script_is( 'wpos-slick-jquery', 'registered' ) ) {
			wp_register_script( 'wpos-slick-jquery', PCIWGAS_URL.'assets/js/slick.min.js', array('jquery'), PCIWGAS_VERSION, true );
		}
		
		// Registring and enqueing public script
		wp_register_script( 'pciwgas-public-script', PCIWGAS_URL.'assets/js/pciwgas-public.js', array('jquery'), PCIWGAS_VERSION, true );
		wp_localize_script( 'pciwgas-public-script', 'Pciwgas', array(
																	'is_mobile' => (wp_is_mobile()) ? 1 : 0,
																	'is_rtl' 	=> (is_rtl()) 		? 1 : 0
																	));
			
	}

	/**
	 * Enqueue admin styles
	 * 
	 * @package Post Category Image With Grid and Slider
	 * @since 1.0
	 */
	function pciwgas_admin_style( $hook ) {	

		// Pages array
		$pages_array = array( 'toplevel_page_pciwgaspro-settings','edit-tags.php','term.php');	
		
	// If page is plugin setting page then enqueue script
		 if( in_array($hook, $pages_array) ) {
			
			// Registring admin script
			wp_register_style( 'pciwgas-admin-style', PCIWGAS_URL.'assets/css/categoryimage-admin.css', null, PCIWGAS_VERSION );
			wp_enqueue_style( 'pciwgas-admin-style' );
		}
	}

	/**
	 * Function to add script at admin side
	 * 
	 * @package Post Category Image With Grid and Slider
	 * @since 1.0
	 */
	function pciwgas_admin_script( $hook ) {
		global $typenow, $wp_version, $wp_query;

		$new_ui = $wp_version >= '3.5' ? '1' : '0'; // Check wordpress version for older scripts

		
		 if ($hook != 'edit-tags.php' && $hook != 'term.php') {
            return;
        }

        wp_enqueue_media();

        //wp_enqueue_script('category-image-js', $this->asset_url('/js/categoryimage.js'), array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'pciwgas-admin-js', PCIWGAS_URL.'assets/js/pciwgas-admin.js', array('jquery'), PCIWGAS_VERSION, true );	

        wp_localize_script('pciwgas-admin-js', 'CategoryImage', array(
            'wp_version' => $wp_version,
            'label'      => array(
                    'title'  => __('Choose Category Image', 'wpcustom-category-image'),
                    'button' => __('Choose Image', 'wpcustom-category-image')
                ),
            'new_ui' 	=>	$new_ui,
            )
        );
	}	
}

$pciwgas_script = new Pciwgas_Script();