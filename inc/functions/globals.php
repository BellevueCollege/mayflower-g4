<?php
/**
 * Set Up Globals Calls
 *
 * These files provide plugin-like functionality embedded within Mayflower.
 *
 * @package Mayflower
 */

/**
 * Globals class used to access Globals data
 */
class Globals {

	/**
	 * Settings
	 *
	 * @var string $settings Settings.
	 */
	public $settings;

	/**
	 * Globals Path
	 *
	 * @var string $path Globals Path.
	 */
	public $path;

	/**
	 * Globals URL
	 *
	 * @var string $url Globals URL.
	 */
	public $url;

	/**
	 * Globals Version Param
	 *
	 * @var string $version Version number.
	 */
	public $version;

	/**
	 * Analytics ID
	 *
	 * @var string $analytics Analytics ID.
	 */
	public $analytics;


	/**
	 * HTML File Path
	 *
	 * @var string $html_filepath File Path..
	 */
	public $html_filepath;

	/**
	 * Lite Head Filename
	 *
	 * @var string $lhead_filename Lite Head Filename.
	 */
	public $lhead_filename = 'lhead.html';

	/**
	 * Branded Head Filename
	 *
	 * @var string $bhead_filename Branded Head Filename.
	 */
	public $bhead_filename = 'bhead.html';

	/**
	 * Branded Footer Filename
	 *
	 * @var string $bfoot_filename Branded Footer Filename.
	 */
	public $bfoot_filename = 'bfoot.html';

	/**
	 * Legal Footer Filename
	 *
	 * @var string $legal_filename Legal Footer Filename.
	 */
	public $legal_filename = 'legal.html';

	/**
	 * Lite Analytics Script Filename
	 *
	 * @var string $galite_filename Filename.
	 */
	public $galite_filename = 'galite.html';

	/**
	 * Branded Analytics Script Filename
	 *
	 * @var string $gabranded_filename Filename.
	 */
	public $gabranded_filename = 'gabranded.html';


	/**
	 * Constructor
	 */
	public function __construct() {

		/**
		 * Load Settings Array
		 */
		$this->settings = is_multisite() ? get_network_option( null, 'globals_network_settings' ) : get_option( 'globals_network_settings' );

		/**
		 * Globals Path (local filesystem)
		 */
		$this->path = (
				! empty( $this->get_globals_option( 'globals_path' ) ) && "1" === $this->get_globals_option( 'append_path' )
			) ? $_SERVER['DOCUMENT_ROOT'] . $this->get_globals_option( 'globals_path' ) :
			$this->get_globals_option( 'globals_path' );

		$this->path = apply_filters( 'mayflower_globals_path', $this->path );

		/**
		 * Filenames
		 */
		$this->html_filepath = $this->path . 'h/';

		/**
		 * Globals URL
		 */
		$this->url = $this->get_globals_option( 'globals_url' ) ?? '/g/3';
		$this->url = apply_filters( 'mayflower_globals_url', $this->url );

		/**
		 * Globals Version
		 */
		$this->version = $this->get_globals_option( 'globals_version' );

		/**
		 * Analytics
		 */
		$this->analytics = $this->get_globals_option( 'globals_google_analytics_code' );

		/**
		 * Actions
		 */
		add_action( 'mayflower_header', array( $this, 'tophead' ) );
		add_action( 'mayflower_header', array( $this, 'tophead_big' ) );
		add_action( 'mayflower_footer', array( $this, 'footer' ), 50 );
		add_action( 'wp_head', array( $this, 'analytics' ), 30 );

	}

	/**
	 * Get an option from globals
	 *
	 * @param string $option Option Name.
	 * @return string Option.
	 */
	private function get_globals_option( $option ) {
		return $this->settings[ $option ];
	}

	/**
	 * Lite Header
	 */
	public function tophead() {
		$header_top = $this->html_filepath . $this->lhead_filename;
		include_once $header_top;
	}

	/**
	 * Branded Header
	 */
	public function tophead_big() {
		$header_top_big = $this->html_filepath . $this->bhead_filename;
		include_once $header_top_big;
	}

	/**
	 * Footer
	 */
	public function footer() {
		$this->big_footer();

		$this->footer_legal();
	}

	/**
	 * Footer
	 */
	public function big_footer() {
		$footer = $this->html_filepath . $this->bfoot_filename;
		include_once $footer;
	}

	/**
	 * Legal Footer
	 */
	public function footer_legal() {
		$footerlegal = $this->html_filepath . $this->legal_filename;
		include_once $footerlegal;
	}

	/**
	 * Analytics
	 */
	public function analytics() {
		$ga_code = $this->html_filepath . ( 'lite' === mayflower_get_option( 'mayflower_brand' ) ? $this->galite_filename : $this->gabranded_filename );

		include_once $ga_code;

		if ( mayflower_get_option( 'ga_code' ) ) :
			// Format reference https://developers.google.com/analytics/devguides/collection/gajs/?hl=nl&csw=1#MultipleCommands.
			?>
			<script type="text/javascript">
				/* Load google analytics scripts (may be duplicate) */
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
				/*Site-Specific GA code*/
				ga('create','<?php echo esc_attr( $mayflower_options['ga_code'] ); ?>','bellevuecollege.edu',{'name':'singlesite'});
				ga('singlesite.send','pageview');
			</script>
			<?php
		endif;

	}
}

