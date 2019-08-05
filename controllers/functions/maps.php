<?php 

function my_acf_init()
{
	acf_update_setting('google_api_key', 'AIzaSyDy2VPcEeE2EuT7539VPJylv5ew3fdPeYw');
}

add_action('acf/init', 'my_acf_init');
