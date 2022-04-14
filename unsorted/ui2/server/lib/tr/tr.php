<?php if ( ! defined( 'MYAPP' ) ) { exit('exit'); } 

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

/* function myapp_exit_on_dirty(){$err=error_get_last();if($err){exit('</br>Exit: '.implode(', ',$err).'.');} } */

function tr ( $arg_msg )
{
	$locale_factory = 'en_US';
	$me="tr";
	if ( $arg_msg == "") {  return $me."-key_empty";}	
	
	if ( defined( 'MYAPP_WORDPRESS' ) ) 	
	{ 
		$locale = get_locale();
	}
	else if ( defined( 'MYAPP_LOCALE' ) )
	{ 
		$locale = MYAPP_LOCALE; 
	}
	else 
	{
		$locale = $locale_factory; 
	}
	if ( $locale = $locale_factory )
	{
		return $arg_msg; // nothing to translate, just return argument
	}
	/*ᐃ*/
	/*ᐁ*/
	$localeFile = dirname( __FILE__ ) . "/locales/".$locale.".eval.php";
	if (!file_exists( $localeFile ) ) 
	{
		return $arg_msg;
	}
	
	$msgs_array = eval( '?>' . file_get_contents( $localeFile ) );
	if ( $msgs_array == false)
	{
		return $me."-array_bad";
	}
	
	if ( !array_key_exists($arg_msg, $msgs_array) ) 
	{
		return $arg_msg;
	}
	else 
	{
		return $msgs_array[$arg_msg]; 
	}
	
	return $me.'-err';
	
}// end tr

function tre ( $arg_msg )
{
	echo tr( $arg_msg );

}
