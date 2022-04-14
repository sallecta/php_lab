<?php if ( ! defined( 'MYAPP' ) ) { exit('exit'); } 

if ( ! defined( 'MYAPP' ) ) { exit; }

class Myapp_0
{
	public 						$db;
	public 						$inter;
	public string 				$version;
	
	private static bool 		$created;
	
	public function __construct( $arg_version, $arg_fname_db_conf )
	{
		if ( isset( self::$created ) ) { exit( 'This class support only 1 instance ('. __LINE__ . ', ' . __FILE__ .').' );}
		
		$this->db = new Myapp_db( $arg_fname_db_conf );
		$this->inter = new Myapp_interact();
		
		/* finally */
		self::$created = true;
	} // end construct
} //end MyApp
