Easy Google Tag Manager Integration
---------------
The Easy Google Tag Manager Integration plugin adds an input field to the global **General Settings** page. Easily fill in your Google Tag Manger ID and the plugin brings the splitet tag manger code into the webpage.

[You can sign up and genrate your Google Tag Manager ID here.](https://www.google.com/tagmanager/ "Google Tag Manager")
This plugin makes it very easy to use the fancy Google Tag Manager on your Wordpress Site. You just need your GTM ID and fill it into the Global Settings.

###Installation###

1. Upload `google-tag-manager-integration` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go to `Settings` > `General` and fill in the ID from your Google Tag Manager. (eg. GTM-A1B2C3)

### FAQ ###
 Can't find the output on my Website?

- first: do you set the GTM ID into your Settings Page ?
- second: does your theme have the `<?php wp_footer(); ?>` call?
- third: have you cleared your cache ?

### Changelog ###
 0.9
* Initial upload of the plugin - enjoy it and feeld free to contanct me
