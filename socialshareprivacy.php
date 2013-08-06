<?php
/**
 * A basic plugin that provides a function to add privacy friendly, non tracking social network share buttons 
 * (Facebook,Twitter, Google+ and more). 
 *
 * This is an adaption as a Zenphoto plugin of:
 * jquery.socialshareprivacy.js | 2 Klicks fuer mehr Datenschutz
 * http://www.heise.de/extras/socialshareprivacy/
 * http://www.heise.de/ct/artikel/2-Klicks-fuer-mehr-Datenschutz-1333879.html
 * Copyright (c) 2011 Hilko Holweg, Sebastian Hilbig, Nicolas Heiringhoff, Juergen Schmidt,
 * Heise Zeitschriften Verlag GmbH & Co. KG, http://www.heise.de
 *
 * with the extensions by:
 * Copyright (c) 2012 Mathias Panzenböck
 * https://github.com/panzi/socialshareprivacy
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
 * @subpackage misc
 */

$plugin_is_filter = 9|THEME_PLUGIN;
$plugin_description = gettext('A basic plugin that provides a function to add privacy friendly, non tracking social network share buttons (Facebook,Twitter, Google+ and more). An adaption as a Zenphoto plugin of the scripts by http://www.heise.de/extras/socialshareprivacy/ and https://github.com/panzi/socialshareprivacy - MIT License (http://www.opensource.org/licenses/mit-license.php).');
$plugin_author = 'Malte Müller (acrylian)';
$plugin_version = '1.0';
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
					'Facebook','socialshareprivacy'=>'socialshareprivacy_facebook',
					'Twitter','socialshareprivacy'=>'socialshareprivacy_twitter',
					'Google+','socialshareprivacy'=>'socialshareprivacy_gplus',
					'Tumblr','socialshareprivacy'=>'socialshareprivacy_tumblr',
					'Reddit','socialshareprivacy'=>'socialshareprivacy_Reddit',
					'Pinterest','socialshareprivacy'=>'socialshareprivacy_pinterest',
					'flattr','socialshareprivacy'=>'socialshareprivacy_flattr',
					'Stumbleupon','socialshareprivacy'=>'socialshareprivacy_stumbleupon',
					gettext('Mail','socialshareprivacy')=>'socialshareprivacy_mail',
					'linkedin','socialshareprivacy'=>'socialshareprivacy_linkedin',
					'xing','socialshareprivacy'=>'socialshareprivacy_xing',
					'buffer','socialshareprivacy'=>'socialshareprivacy_buffer',
					'delicious','socialshareprivacy'=>'socialshareprivacy_delicious',
					'disqus','socialshareprivacy'=>'socialshareprivacy_disqus',
					'Hackernews','socialshareprivacy'=>'socialshareprivacy_hackernews'
				),
				'desc' => gettext_pl('Select the social networks you wish buttons to appear for.','socialshareprivacy'))
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
	<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_facebook')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.facebook.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_twitter')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.twitter.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_gplus')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.gplus.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_tumblr')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.tumblr.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_reddit')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.reddit.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_pinterest')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.pinterest.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_flattr')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.flattr.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_stumbleupon')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.stumbleupon.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_mail')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.mail.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_linkedin')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.linkedin.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_xing')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.xing.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_buffer')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.buffer.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_delicious')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.delicious.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_disqus')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.disqus.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_hackernews')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts/jquery.socialshareprivacy.hackernews.js"></script><?php } ?>

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
  	case 'nl_NL':
  		$dir = '/nl';
  		break;
  	case 'ru_RU':
  		$dir = '/ru';
  		break;
  	case 'pl_PL':
  		$dir = '/pl';
  		break;
  }
  if(!empty($dir)) {
 		 ?>
			<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.js"></script>
			
			<?php if(getOption('socialshareprivacy_facebook')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.facebook.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_twitter')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.twitter.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_gplus')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.gplus.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_tumblr')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.tumblr.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_reddit')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.reddit.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_pinterest')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.pinterest.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_flattr')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.flattr.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_stumbleupon')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.stumbleupon.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_mail')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.mail.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_linkedin')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.linkedin.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_xing')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.xing.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_buffer')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.buffer.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_delicious')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.delicious.js"></script>
			<?php } ?>
			<?php if(getOption('socialshareprivacy_disqus')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.disqus.js"></script>
			<?php } ?>
  		<?php 
  		// For this not translations for all available!
  		if($locale == 'fr_FR' || $locale == 'nl_NL') {
  			$dir = '';
  		}
  		if(getOption('socialshareprivacy_hackernews')) { ?>
  			<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/scripts<?php echo $dir; ?>/jquery.socialshareprivacy.hackernews.js"></script>
  		<?php } 
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
		$(document).ready(function () {
			$('.<?php echo $class; ?>').socialSharePrivacy();
		});
	// ]]>
	</script>
	<div class="socialshareprivacy"></div>
	<?php
}
?>