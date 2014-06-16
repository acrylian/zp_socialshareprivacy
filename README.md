zp_socialshareprivacy
==========
A Zenphoto plugin that provides a function to add privacy friendly, non tracking social network share buttons (Facebook,Twitter, Google+ and others). 

Put the file in your `/plugins` folder and modify your theme to use it. Please see the file comments itself for more usage information.

##Usage

Place `<?php printSocialSharePrivacyButtons(); ?>` where you wish the buttons to appear. You might need to adjust/override the plugin's default css stylings to fit your site's design. 

The plugin does not provide any options for the sharing itself. Modify the jQuery calls within `printSocialSharePrivacyButtons()` to your liking.


This is an adaption as a Zenphoto plugin of:
**jquery.socialshareprivacy.js | 2 Klicks fuer mehr Datenschutz (2 clicks for more privacy)**
* http://www.heise.de/extras/socialshareprivacy/
* http://www.heise.de/ct/artikel/2-Klicks-fuer-mehr-Datenschutz-1333879.html
Copyright (c) 2011 Hilko Holweg, Sebastian Hilbig, Nicolas Heiringhoff, Juergen Schmidt,
Heise Zeitschriften Verlag GmbH & Co. KG, http://www.heise.de

Wth the extensions by:
Copyright (c) 2012 Mathias Panzenböck
https://github.com/panzi/SocialSharePrivacy

MIT License (http://www.opensource.org/licenses/mit-license.php)
