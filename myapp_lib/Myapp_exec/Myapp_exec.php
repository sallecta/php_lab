<?php if ( ! defined( 'Myapp' ) ) { exit("direct execution prevented\n"); }

class Myapp_exec
{
	private static bool 		$created;
	
	public function __construct(  )
	{
		/* header */
		if ( isset( self::$created ) ) { exit( 'This class support only 1 instance ('. __LINE__ . ', ' . __FILE__ .').' );}
		/* end header */
		
		
		
		/* footer */
		self::$created = true;
	} // end construct
	
	public function no_wait( $arg )
	{
		exec($arg . " > /dev/null &");   
	}
} //end Myapp_1instance
