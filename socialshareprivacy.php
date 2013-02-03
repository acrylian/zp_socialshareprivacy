<?php
/**
 * A basic plugin that provides a function to add privacy friendly, non tracking social network share buttons 
 * (Facebook,Twitter, Google+ and more). 
 *
 * This is an adaption as a Zenphoto plugin of:
 * jquery.socialshareprivacy.js | 2 Klicks fuer mehr Datenschutz
 * http://www.heise.de/extras/socialshareprivacy/
 * http://www.heise.de/ct/artikel/2-Klicks-fuer-mehr-Datenschutz-1333879.html
 *
 * Copyright (c) 2011 Hilko Holweg, Sebastian Hilbig, Nicolas Heiringhoff, Juergen Schmidt,
 * Heise Zeitschriften Verlag GmbH & Co. KG, http://www.heise.de
 *
 * Copyright (c) 2012 Mathias Panzenböck
 * https://github.com/panzi/SocialSharePrivacy
 *
 * A basic plugin that provides a function to add privacy friendly, non tracking social network share buttons (Facebook,Twitter, Google+ and others). 
 *
 * Place <?php printSocialSharePrivacyButtons(); ?> where you wish the buttons to appear.
 * You might need to adjust/override the plugin's default css stylings to fit your site design. 
 *
 * The plugin does not provide any options for the sharing itself. Modify the jQuery calls within printSocialSharePrivacyButtons() to your liking.
 *
 * Note: The button texts are available in English, French and German. The plugin text itself are not yet translated.
 *
 *
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @author Malte Müller (acrylian) adapting from Hilko Holweg, Sebastian Hilbig, Nicolas Heiringhoff, Juergen Schmidt,
 * Heise Zeitschriften Verlag GmbH & Co. KG and Mathias Panzenböck
 *
 * @package plugins
 */

$plugin_is_filter = 9|THEME_PLUGIN;
$plugin_description = gettext('A basic plugin that provides a function to add privacy friendly, non tracking social network share buttons (Facebook,Twitter, Google+ and more). An adaption as a Zenphoto plugin of the scripts by http://www.heise.de/extras/socialshareprivacy/ and https://github.com/panzi/SocialSharePrivacy - MIT License (http://www.opensource.org/licenses/mit-license.php).');
$plugin_author = 'Malte Müller (acrylian)';
$plugin_version = '1.4.4';
$option_interface = 'socialshareprivacy_options';
zp_register_filter('theme_head','socialshareprivacyJS');

class socialshareprivacy_options {

	/**
	 * class instantiation function
	 */
	function __construct() {
	
	}
	
	function getOptionsSupported() {
		/* 
			The option definitions are stored in a multidimensional array. There are several predefine option types.
			Options types are the same for plugins and themes.
		*/
		$options = array(
			gettext_pl('Social networks','socialshareprivacy') => array(
				'key' => 'socialshareprivacy_socialnetworks',
				'type' => OPTION_TYPE_CHECKBOX_UL,
				'order' => 0,
				'checkboxes' => array( // The definition of the checkboxes
					gettext_pl('Facebook','socialshareprivacy')=>'socialshareprivacy_facebook',
					gettext_pl('Twitter','socialshareprivacy')=>'socialshareprivacy_twitter',
					gettext_pl('Google+','socialshareprivacy')=>'socialshareprivacy_googleplus',
					gettext_pl('Tumblr','socialshareprivacy')=>'socialshareprivacy_tumblr',
					gettext_pl('Reddit','socialshareprivacy')=>'socialshareprivacy_Reddit',
					gettext_pl('Pinterest','socialshareprivacy')=>'socialshareprivacy_pinterest',
					gettext_pl('flattr','socialshareprivacy')=>'socialshareprivacy_flattr',
					gettext_pl('Stumbleupon','socialshareprivacy')=>'socialshareprivacy_stumbleupon',
					gettext_pl('Mail','socialshareprivacy')=>'socialshareprivacy_mail',
					gettext_pl('linkedin','socialshareprivacy')=>'socialshareprivacy_linkedin',
					gettext_pl('xing','socialshareprivacy')=>'socialshareprivacy_xing',
					gettext_pl('buffer','socialshareprivacy')=>'socialshareprivacy_buffer',
					gettext_pl('delicious','socialshareprivacy')=>'socialshareprivacy_delicious',
					gettext_pl('disqus','socialshareprivacy')=>'socialshareprivacy_disqus',
				),
				'desc' => gettext_pl('NOTE: CURRENTLY NOT IMPLEMENTED! Select the social networks you wish buttons to appear','socialshareprivacy'))
		);
		
	return $options;
	}
}
/**
* Adds the jQuery calls to the theme head via filter
*/
function socialshareprivacyJS() {
	$locale = getUserLocale();
	?>
	<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/jquery.cookies.js"></script>
	<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.js"></script>
	<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.facebook.js"></script>
	<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.twitter.js"></script>
	<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.gplus.js"></script>
	<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.tumblr.js"></script>
	<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.reddit.js"></script>
	<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.pinterest.js"></script>
	<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.flattr.js"></script>
	<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.stumbleupon.js"></script>
	<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.mail.js"></script>
	<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.linkedin.js"></script>
	<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.xing.js"></script>
	<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.buffer.js"></script>
	<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.delicious.js"></script>
	<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.disqus.js"></script>
	<?php
	$dir = '';
	
	//Get the sub dir for the supported button languages.
	switch($locale) {
  	case 'de_DE':
  		$dir = '/de';
  		break;
  	case 'fr_FR':
  		$dir = '/fr';
  		break;
  }
  switch($locale) {
  	case 'de_DE':
  	case 'fr_FR':
 		 ?>
			<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.js"></script>
			<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.facebook.js"></script>
			<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.twitter.js"></script>
			<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.gplus.js"></script>
			<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.tumblr.js"></script>
			<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.reddit.js"></script>
			<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.pinterest.js"></script>
			<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.flattr.js"></script>
			<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.stumbleupon.js"></script>
			<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.mail.js"></script>
			<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.linkedin.js"></script>
			<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.xing.js"></script>
			<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.buffer.js"></script>
			<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.delicious.js"></script>
			<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.disqus.js"></script>
  		<?php
  		break;
  }
}

/**
* Place this where you wish the buttons to appear. The plugin includes also jQUery calls to set the buttons up to allow multiple button sets per page.
*  
* @param string $class The CSS class to assign to the element. Default 'socialshareprivacy'. For multiple button sets per page set individual classes.
*/
function printSocialSharePrivacyButtons($class='socialshareprivacy') {
	?>
	<script type="text/javascript">
		// <![CDATA[
		// Default order of buttons:
		$.fn.socialSharePrivacy.settings.order = ['facebook', 'gplus', 'twitter', 'xing'];
		$.fn.socialSharePrivacy.settings.path_prefix = '<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/';
		$.fn.socialSharePrivacy.settings.css_path = 'stylesheets/jquery.socialshareprivacy.css';
		//$.fn.socialSharePrivacy.settings.path_prefix = '../';

		$(document).ready(function () {
			$('.<?php echo $class; ?>').socialSharePrivacy();
		});
	// ]]>
	</script>
	<div class="socialshareprivacy"></div>
	<?php
}
?>