<?php
/**
 * This is an adaption of the tool provided by the German Heise Verlag (publisher): http://www.heise.de/extras/socialshareprivacy/
 *
 * A basic plugin that provides a function to add privacy friendly social network share buttons (Facebook,Twitter, Google+). 
 * Since these buttons are under suspicion that they transfer data even from normal visitors even if they are not logged in
 * to any of these services this plugin features switches to turn them explicitly on.
 *
 * Only one button call per page allowed. So use best for single items or generally at the bottom or in the sidebar of your site.
 * You might need to adjust/override the plugin's default css stylings. Place <?php printSocialSharePrivacyButtons(); ?> for the buttons
 *
 * The plugin does not provide any options. Modify the plugin itself in the jQuery calls to adjust to your liking.
 *
 * Note: The plugin is in German only currently. Localizsation probably follows later.
 *
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @author Malte Müller (acrylian)
 *
 * @package plugins
 */

$plugin_description = gettext_pl('A basic plugin that provides a function to add privacy friendly social network share buttons (Facebook,Twitter, Google+). A visitor has to be enable them explicitly first so they do not transfer unwanted data. An adaption of http://www.heise.de/extras/socialshareprivacy/',"socialshareprivacy");
$plugin_author = 'Malte Müller (acrylian)';
$plugin_version = '1.4.3';
zp_register_filter('theme_head','socialprivacyshareJS');

/**
* Adds the jQuery calls to the theme head via filter
*/
function socialprivacyshareJS() {
	$locale = getUserLocale();
	$txt_info = gettext_pl('2 clicks for more privacy: The button to share is enabled only if you click here first. On enabling data is submitted to third parties - see <em>i</em>.',"socialshareprivacy");
	?>
	<script type="text/javascript" src="<?php echo WEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/jquery.socialshareprivacy.js"></script>
	<script type="text/javascript">
    jQuery(document).ready(function($){
      if($('#socialshareprivacy').length > 0){
        $('#socialshareprivacy').socialSharePrivacy({
        	txt_help : '<?php echo gettext_pl("If you enable these fields by clicking, data will be submitted to Facebook, Twitter or Google in the USA and possibly stored there. For more information click the <em>i</em> (German only).","socialshareprivacy"); ?>',
         	css_path: '<?php echo WEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/socialshareprivacy/socialshareprivacy.css',
         	settings_perma: '<?php echo gettext_pl("Activate persistent and agree to data submission:","socialshareprivacy"); ?>',
         	services : {
   					facebook : {
   						'status' : 'on',
      				'perma_option': 'on',
      				'dummy_img': '<?php echo WEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/socialshareprivacy/images/dummy_facebook_en.png',
      				'txt_info': '<?php echo $txt_info; ?>',
      				'language': '<?php echo $locale; ?>'
    				}, 
    				twitter : {
        			'status' : 'on',
        			'perma_option': 'on',
        			'dummy_img': '<?php echo WEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/socialshareprivacy/images/dummy_twitter.png',
        			'txt_info': '<?php echo $txt_info; ?>',
        			'language': '<?php echo $locale; ?>'
    				},
    				gplus : {
    					'status' : 'on',
    					'perma_option': 'on',
      				'display_name' : 'Google+',
      				'dummy_img': '<?php echo WEBPATH.'/'.USER_PLUGIN_FOLDER; ?>/socialshareprivacy/socialshareprivacy/images/dummy_gplus.png',
      				'txt_info': '<?php echo $txt_info; ?>',
      				'language': '<?php echo $locale; ?>'
    				}
  				}
        }); 
      }
    });
  </script>
	<?php
}

/**
* Place this where you wish the buttons to appear. Use only once per page otherwise you get CSS conflicts! 
* For multiple usages per page you need to do it manually.
*/
function printSocialSharePrivacyButtons() {
	?>
	<div id="socialshareprivacy"></div>
	<?php
}
?>