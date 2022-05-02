<?php if ( ! defined( 'Myapp' ) ) { exit("direct execution prevented\n"); }

class Myapp_main 
{
	public array $settings;
	
	public string $action_selected = 'n\a';
	
	private static bool 		$created;
	
	public function __construct( array $argArray )
	{
		/* header */
		if ( isset( self::$created ) ) { exit( 'This class support only 1 instance ('. __LINE__ . ', ' . __FILE__ .').' );}
		/* end header */
		
		$this->settings_get($argArray['settings_file']);
		
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
	
	
	public function actions_get()
	{
		$actions = glob( $this->settings['actions_dir'] . "/*.settings.eval.php");
		foreach ( $actions as $action )
		{
			printf( basename($action)."\n");
		}
	} // actions_get
	
	/*  */
	private function settings_get( &$argFname )
	{
		if ( ! file_exists($argFname) ) {exit ("Settings file ($argFname) not found (". __FILE__ ."\n");}
		$this->settings = eval( '?>' . file_get_contents( $argFname ) );
	} // settings_get
} // end Myapp_main
