<?php if ( ! defined( 'MYAPP' ) ) { exit('exit'); } 

if ( ! defined( 'MYAPP' ) ) { exit; }

class Myapp_interact
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
	
	public function request_check()
	{
		new anotice( "info", $_SERVER['REQUEST_METHOD']);
		var_dump($_REQUEST);
	} // request_check
} //end Myapp_interact
