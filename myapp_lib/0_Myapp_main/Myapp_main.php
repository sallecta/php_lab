<?php if ( ! defined( 'Myapp' ) ) { exit("direct execution prevented\n"); }

class Myapp_main 
{
	public array $settings;
	
	public $action_request;
	
	private static bool 		$created;
	
	public function __construct( array $argArray )
	{
		/* header */
		if ( isset( self::$created ) ) { exit( 'This class support only 1 instance ('. __LINE__ . ', ' . __FILE__ .').' );}
		/* end header */
		
		$this->settings_get($argArray['settings_file']);
		
		if ( array_key_exists( 1, $_SERVER['argv'] ) )
		{
			//echo var_dump($_SERVER['argv']);
			$th2is->action_request = $_SERVER['argv'][1];
			var_dump($this->action_request);
			var_dump($_SERVER['argv'][1]);
		}
				
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
	
	public function san_str( $arg )
	{
		filter_var ( $arg, FILTER_SANITIZE_STRING);
	} // end e
	
	/*  */
	private function settings_get( &$argFname )
	{
		if ( ! file_exists($argFname) ) {exit ("Settings file ($argFname) not found\n");}
		$this->settings = eval( '?>' . file_get_contents( $argFname ) );
	} // settings_get
} // end Myapp_main
