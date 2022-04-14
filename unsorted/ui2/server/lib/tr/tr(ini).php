<?php if ( ! defined( 'MYAPP' ) ) { exit('exit'); } 

if ( ! defined( 'MYAPP' ) ) { exit; }

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

function tr ( $argMsgKey )
{
	$me="_cosn_tr";
	if ( $argMsgKey == "") {  return $me."-key_empty";}	
	
	if ( defined( 'MYAPP_WORDPRESS' ) ) 	
	{ 
		$locale = get_locale();
	}
	else
	{
		if ( defined( 'MYAPP_LOCALE' ) )
		{ 
			$locale = MYAPP_LOCALE; 
		}
		else 
		{
			$locale = 'en_US'; 
		}
	}
	
	$localeFile = dirname( __FILE__ ) . "/locales/".$locale.".ini.php";
	if (!file_exists( $localeFile ) ) 
	{
		return $argMsgKey;
	}
	
	$msgs_array = parse_ini_file($localeFile);
	if ( $msgs_array == false)
	{
		return $me."-ini_bad";
	}
	
	if ( !array_key_exists($argMsgKey, $msgs_array) ) 
	{
		return $argMsgKey;
	}
    else 
    {
		return $msgs_array[$argMsgKey]; 
	}
	
	return $me.'-err';

}

function tre ( $argMsgKey )
{
	echo tr( $argMsgKey );

}
