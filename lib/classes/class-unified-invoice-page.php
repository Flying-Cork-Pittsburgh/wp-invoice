<?php
/**
 * Unified Invoice Page handler
 */

namespace UsabilityDynamics\WPI {

  /**
   * Class UnifiedInvoicePage
   * @package UsabilityDynamics\WPI
   * @author korotkov@ud
   */
  class UnifiedInvoicePage {

    /**
     * Init
     */
    public function __construct() {
      global $wpi_settings;

      /**
       * Add new display option
       */
      add_filter( 'wpi_where_to_display_options', array( $this, 'add_new_display_option' ) );

      /**
       * If we are on front-end and display option is set to 'Unified Page Template'
       * Change template
       */
      if ( !is_admin() && !empty($wpi_settings['where_to_display']) && $wpi_settings['where_to_display'] == 'unified_page' ) {
        add_action('wpi_template_redirect', array($this, 'template_redirect_change'));
      }
    }

    /**
     *
     */
    public function page_specific_styles() {
      wp_enqueue_style('wpi-unified-page-styles', ud_get_wp_invoice()->path('/static/styles/wpi-unified-page.css', 'url'));
    }

    /**
     * Remove styles and add specific one
     */
    public function remove_all_theme_styles() {
      global $wp_styles;
      $wp_styles->queue = array();

      do_action( 'wpi_unified_page_styles' );
    }

    /**
     * Remove scripts except invoice page specific
     */
    public function remove_all_theme_scripts() {
      global $wp_scripts, $wpi_settings;
      $wp_scripts->queue = array();

      wp_enqueue_script('jquery.validate');
      wp_enqueue_script('wpi-gateways');
      wp_enqueue_script('jquery.maskedinput');
      wp_enqueue_script('wpi-frontend-scripts');

      if (!empty($wpi_settings['ga_event_tracking']) && $wpi_settings['ga_event_tracking']['enabled'] == 'true') {
        wp_enqueue_script('wpi-ga-tracking', ud_get_wp_invoice()->path( "static/scripts/wpi.ga.tracking.js", 'url' ), array('jquery'));
      }

      do_action( 'wpi_unified_page_scripts' );
    }

    /**
     * New display option
     * @param $options
     * @return mixed
     */
    public function add_new_display_option( $options ) {
      $options['unified_page'] = __( 'Unified Page Template', ud_get_wp_invoice()->domain );
      return $options;
    }

    /**
     * Custom template redirect definition
     */
    public function template_redirect_change() {
      global $wpi_settings, $wpi_invoice_object, $invoice;

      $invoice = $wpi_invoice_object->data;

      /**
       * Disable all unnecessary styles and scripts
       */
      add_action('wp_print_styles', array($this, 'remove_all_theme_styles'), 999);
      add_action('wp_print_scripts', array($this, 'remove_all_theme_scripts'), 999);
      add_action('wpi_unified_page_styles', array($this, 'page_specific_styles'));

      /**
       * Track invoice widget
       */
      wpi_track_invoice_page_visit( $wpi_invoice_object );

      /**
       * Prepare description
       */
      add_action('wpi_description', 'wpautop');
      add_action('wpi_description', 'wptexturize');
      add_action('wpi_description', 'shortcode_unautop');
      add_action('wpi_description', 'convert_chars');
      add_action('wpi_description', 'capital_P_dangit');

      /**
       * Declare the variable that will hold our AJAX url for JavaScript purposes
       */
      wp_localize_script('wpi-gateways', 'wpi_ajax', array('url' => admin_url('admin-ajax.php')));

      /**
       * Necessary header hook
       */
      add_action('wp_head', array('WPI_UI', 'frontend_header'));

      /**
       * Pre-process title
       */
      if ($wpi_settings['replace_page_title_with_subject'] == 'true' || $wpi_settings['hide_page_title'] == 'true') {
        add_action('wp_title', array('WPI_UI', 'wp_title'), 0, 3);
      }
      if ($wpi_settings['replace_page_heading_with_subject'] == 'true' || $wpi_settings['hide_page_title'] == 'true') {
        add_action('the_title', array('WPI_UI', 'the_title'), 0, 2);
      }

      /**
       * Remove admin bar
       */
      remove_action( 'wp_head', '_admin_bar_bump_cb' );
      show_admin_bar( 0 );

      /**
       * Load template functions
       */
      include_once( ud_get_wp_invoice()->path( '/lib/class_template_functions.php', 'dir' )  );

      /**
       * Load template
       */
      load_template( ud_get_wp_invoice()->path('/static/views/unified-invoice-page.php', 'dir'), 1 );
      exit;
    }

  }

}