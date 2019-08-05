<?php 

define('SITE_KEY', '6Lf5n48UAAAAACQj8K2kBCb7495TzqdjQtwYGi-3');
define('SECRETE_KEY', '6Lf5n48UAAAAALz2o8iMcyQXqRiwCyGlkzOmrrn1');

function checkReCaptcha($form)
{
	$googleValidade = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.SECRETE_KEY.'&response='.$form['fitlers']['token'].'');
	$debug = json_decode($googleValidade);
	if($debug->success == true && $debug->score >= 0.1)
	{
		return true;
	}
	else
	{
		return false;
	}
}