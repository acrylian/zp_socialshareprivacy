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
 * Place <?php printSocialSharePrivacyButtons(); ?> where you wish the buttons to appear.
 * You might need to adjust/override the plugin's default css stylings to fit your site's design. 
 *
 * The plugin does not provide any options for the sharing itself. Modify the jQuery calls within printSocialSharePrivacyButtons() to your liking.
 *
 * Note: The button texts are available in English, French and German. The plugin text itself are not yet translated.
 *
 *
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @author Malte Müller (acrylian) adapted from Hilko Holweg, Sebastian Hilbig, Nicolas Heiringhoff, Juergen Schmidt,
 * Heise Zeitschriften Verlag GmbH & Co. KG and Mathias Panzenböck
 *
 * @package plugins
 * @subpackage misc
 */

$plugin_is_filter = 9|THEME_PLUGIN;
$plugin_description = gettext('A basic plugin that provides a function to add privacy friendly, non tracking social network share buttons (Facebook,Twitter, Google+ and more). An adaption as a Zenphoto plugin of the scripts by http://www.heise.de/extras/socialshareprivacy/ and https://github.com/panzi/socialshareprivacy - MIT License (http://www.opensource.org/licenses/mit-license.php).');
$plugin_author = 'Malte Müller (acrylian)';
$plugin_version = '1.0.6';
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
			gettext('Social networks') => array(
				'key' => 'socialshareprivacy_socialnetworks',
				'type' => OPTION_TYPE_CHECKBOX_UL,
				'order' => 0,
				'checkboxes' => array( // The definition of the checkboxes
					'Facebook'=>'socialshareprivacy_facebook',
					'Twitter' =>'socialshareprivacy_twitter',
					'Google+'=>'socialshareprivacy_gplus',
					'Tumblr'=>'socialshareprivacy_tumblr',
					'Reddit'=>'socialshareprivacy_Reddit',
					'Pinterest'=>'socialshareprivacy_pinterest',
					'flattr'=>'socialshareprivacy_flattr',
					'Stumbleupon'=>'socialshareprivacy_stumbleupon',
					'Mail'=>'socialshareprivacy_mail',
					'linkedin'=>'socialshareprivacy_linkedin',
					'xing' =>'socialshareprivacy_xing',
					'buffer' =>'socialshareprivacy_buffer',
					'delicious'=>'socialshareprivacy_delicious',
					'disqus' =>'socialshareprivacy_disqus',
					'Hackernews' =>'socialshareprivacy_hackernews'
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
	<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/socialshareprivacy.js"></script>
	<?php if(getOption('socialshareprivacy_facebook')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/modules/facebook.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_twitter')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/modules/twitter.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_gplus')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/modules/gplus.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_tumblr')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/modules/tumblr.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_reddit')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/modules/reddit.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_pinterest')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/modules/pinterest.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_flattr')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/modules/flattr.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_stumbleupon')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/modules/stumbleupon.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_mail')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/modules/mail.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_linkedin')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/modules/linkedin.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_xing')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/modules/xing.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_buffer')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/modules/buffer.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_delicious')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/modules/delicious.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_disqus')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/modules/disqus.js"></script><?php } ?>
	<?php if(getOption('socialshareprivacy_hackernews')) { ?><script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/modules/hackernews.js"></script><?php } ?>

	<?php
	$dir = '';
	
	//Get the sub dir for the supported button languages.
	switch($locale) {
  	case 'de_DE':
  		$dir = 'locale/de';
  		break;
  	case 'fr_FR':
  		$dir = 'locale/fr';
  		break;
  	case 'nl_NL':
  		$dir = 'locale/nl';
  		break;
  	case 'ru_RU':
  		$dir = 'locale/ru';
  		break;
  	case 'pl_PL':
  		$dir = 'locale/pl';
  		break;
  	case 'pt_PT':
  		$dir = 'locale/pt';
  		break;
  	case 'es_ES':
  		$dir = 'locale/es';
  		break;
  	case 'it_IT':
  		$dir = 'locale/it';
  		break;
  }
  if(!empty($dir)) {
 		 ?>
			<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/<?php echo $dir; ?>/socialshareprivacy.js"></script>
			
			<?php if(getOption('socialshareprivacy_facebook')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/<?php echo $dir; ?>/modules/facebook.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_twitter')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/<?php echo $dir; ?>/modules/twitter.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_gplus')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/<?php echo $dir; ?>/modules/gplus.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_tumblr')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/<?php echo $dir; ?>/modules/tumblr.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_reddit')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/<?php echo $dir; ?>/modules/reddit.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_pinterest')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/<?php echo $dir; ?>/modules/pinterest.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_flattr')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/<?php echo $dir; ?>/modules/flattr.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_stumbleupon')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/<?php echo $dir; ?>/modules/stumbleupon.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_mail')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/<?php echo $dir; ?>/modules/mail.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_linkedin')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/<?php echo $dir; ?>/modules/linkedin.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_xing')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/?php echo $dir; ?>/modules/xing.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_buffer')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/<?php echo $dir; ?>/modules/buffer.js"></script>
			<?php } ?>
			
			<?php if(getOption('socialshareprivacy_delicious')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/<?php echo $dir; ?>/modules/delicious.js"></script>
			<?php } ?>
			<?php if(getOption('socialshareprivacy_disqus')) { ?>
				<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/<?php echo $dir; ?>/modules/disqus.js"></script>
			<?php } ?>
  		<?php 
  		// For this not translations for all available!
  		if($locale == 'fr_FR' || $locale == 'nl_NL') {
  			$dir = '';
  		}
  		if(getOption('socialshareprivacy_hackernews')) { ?>
  			<script type="text/javascript" src="<?php echo FULLWEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/javascripts/<?php echo $dir; ?>/modules/hackernews.js"></script>
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
		$.fn.socialSharePrivacy.settings.css_path = 'stylesheets/socialshareprivacy.css';
		$(document).ready(function () {
			$('.<?php echo $class; ?>').socialSharePrivacy();
		});
	// ]]>
	</script>
	<div class="socialshareprivacy"></div>
	<?php
}
?>