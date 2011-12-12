<?php
/**
 *
 * Use to insert the Google Webmaster Tools verification meta tag into your site pages
 *
 * @author Stephen Billard (sbillard)
 * @package plugins
 */

$plugin_is_filter = 9|THEME_PLUGIN;
$plugin_description = gettext("Places a Google Site Verification metatag into the header of your site's pages.");
$plugin_author = "Stephen Billard (sbillard)";
$plugin_version = '1.4.2';
$option_interface = 'googleVerifyOptions';

if (getOption('google-site-verification')) {
	zp_register_filter('theme_head','googleVerifyHead');
}

/**
* Option handler class
*
*/
class googleVerifyOptions {
	/**
	 * class instantiation function
	 *
	 * @return security_logger
	 */
	function __construct() {
		setOptionDefault('google-site-verification', '');
	}


	/**
	 * Reports the supported options
	 *
	 * @return array
	 */
	function getOptionsSupported() {
		return array(	gettext('Verification content') => array('key' => 'google-site-verification', 'type' => OPTION_TYPE_TEXTBOX,
										'desc' => gettext('Insert the <em>content</em> portion of the meta tag supplied by Google.'))
		);
	}

	function handleOption($option, $currentValue) {
	}

}

function googleVerifyHead() {
	?>
	<meta name="google-site-verification" content="<?php echo getOption('google-site-verification')?>" />
	<?php
}
?>