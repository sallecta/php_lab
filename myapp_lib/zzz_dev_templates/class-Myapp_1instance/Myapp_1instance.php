<?php if ( ! defined( 'Myapp' ) ) { exit("direct execution prevented\n"); }

class Myapp_1instance
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
} //end Myapp_1instance
