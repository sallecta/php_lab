<?php if ( ! defined( 'Myapp' ) ) { exit("direct execution prevented\n"); }

class Myapp_settings
{
	private static bool 		$created;
	
	public static function arr( $arg )
	{
		return eval( '?>' . file_get_contents( $arg ) );
	} // end construct
} //end Myapp_settings
