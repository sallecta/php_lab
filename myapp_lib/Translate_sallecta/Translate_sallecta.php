<?php if(!defined( 'Myapp' )){exit("direct execution prevented\n". __FILE__ ."\n");}


class Translate_sallecta
{
	/*
	Usage:
	$tr = function ($arg) { Translate_sallecta::tr($arg); };
	$trp = function ($arg) { Translate_sallecta::tre($arg); };
	
	$trp('Hello, World');
	*/
	public static function tr ( $arg_msg )
	{
		$locale_factory = 'en_US';
		$me="Translate_sallecta";
		if ( $arg_msg == "") {  return $me."-arg_msg";}	
		
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
	
	public static function trp ( $arg_msg )
	{
		printf( self::tr( $arg_msg ) );
	
	}
		
	public static function tre ( $arg_msg )
	{
		printf( self::tr( $arg_msg ) . "\n" );
	
	}
} // end



