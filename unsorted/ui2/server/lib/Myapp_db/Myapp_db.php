<?php if ( ! defined( 'MYAPP' ) ) { exit('exit'); } 

class Myapp_db
{
	private static bool $created;
	private static array $cred;
	
	public function __construct( string $arg_fname_db_conf )
	{
		/*
		array
			(
				'host' 		=> 'localhost',
				'user' 		=> '_',
				'password' 	=> '_',
				'dbname' 	=> 'db',
			); // end $cred 
		*/
		if ( isset( self::$created ) ) { exit( 'This class support only 1 instance ('. __LINE__ . ', ' . __FILE__ .').' );}
		self::$cred = eval( '?>' . file_get_contents( $arg_fname_db_conf ) );
		/* final steps */
		self::$created = true;
	} // end get_conf
	
	public function connection_test()
	{
		$cred = self::$cred;
		$db_link = new mysqli($cred['host'], $cred['user'], $cred['password'], $cred['dbname']);
		// Check for errors
		if( mysqli_connect_errno() )
		{
			new anotice( "error", mysqli_connect_error() );
			$result=false;
		}
		else
		{
			//new anotice( "success", "db connection success");
			$result=true;
		}
		return $result;
	} // connection_test
} //end MyApp
