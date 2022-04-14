<?php if ( ! defined( 'Myapp' ) ) { exit("direct execution prevented\n"); }

class Myapp_main 
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
	
	public function e( $arg )
	{
		printf( $arg );
	} // end e
	
	public function p( $arg )
	{
		printf( $arg . '/n' );
	} // end e
} // end Myapp_main
