<?php if ( ! defined( 'Myapp' ) ) { exit("direct execution prevented\n". __FILE__ ."\n"); }
class anotice {

	/*
	usage:
	new anotice( "error", "test message");
	new anotice( "warning", "test message");
	new anotice( "success", "test message");
	new anotice( "info", "test message");
	*/
	private static $conf_eonly = false;
	public $type='info'; /* error/warning/success/info */
    public $msg='';
    public $func='';
    public $file='';
    public $plugin='';
    public $line='';
	private $style = '';

	public function __construct( $argType, $argMsg, $argDismissible=true ) 
	{
		if ( self::$conf_eonly ) { if ( $argType != 'error' ) return; }
		$this->type				= $argType;
		$this->msg				= $argMsg;
		$backtrace	= debug_backtrace();
		//var_dump($backtrace);
		$file = $backtrace[0]['file'];
		$strposition = strpos($file,'plugins');
		if (  ! $this->is_cli() )  {$strposition = $strposition + strlen('plugins')+1;}
		$file = substr($file ,$strposition);
		$plugin = explode('/' ,$file)[0];
		if ( $plugin=='' ) { $plugin='n/a';}
		$line = $backtrace[0]['line'];
		$function = $backtrace[1]['function'];
		if ( array_key_exists('class', $backtrace[1]) )
		{
			$function	= $backtrace[1]['class'] . "::" . $function;
		}
		$this->func			= $function;
		$this->file			= $file;
		$this->plugin		= $plugin;
		$this->line			= $line;
		
		if (  $this->is_cli() ) { $this->anotice_cli(); return; }
		
		if( defined( 'MYAPP_WORDPRESS' ) )
		{
			if(!$argDismissible){ $dismissible_class = ""; } else { $dismissible_class = "is-dismissible";}
			$type = $this->type;
			$this->style = "class=\"notice notice-$type $dismissible_class\"";
			add_action( 'admin_notices', array( $this, 'anotice_callable' ) );
		}
		else
		{
			if ( $argType == 'error') { $type_color = 'red'; }
			else if ( $argType == 'warning') { $type_color = 'orange'; }
			else if ( $argType == 'success') { $type_color = 'green'; }
			else if ( $argType == 'info') { $type_color = 'navy'; }
			else { $type_color = 'black'; }
			$this->style = "style=\"display:block; border: 2px dotted $type_color; padding: 3px; background:#e5e5e5;\"";
			$this->anotice_callable();
		};
	} // end __construct

	public function anotice_callable()
	{
		$plugin				= $this->plugin;
		$type				= ucfirst($this->type);
		$s					= "strong";
		$style				= $this->style;
		echo "<div $style>";
			echo "<p>$type: <mark>{$this->msg}</mark>.</br>
				Plugin: <$s>$plugin</$s>. 
				Function: <$s>{$this->func}</$s>.
				File: <$s>{$this->file}</$s>.
				Line: <$s>{$this->line}</$s>.</p>";
		echo "</div>";
	} // end anotice_callable
	
	private function anotice_cli()
	{
		$plugin				= $this->plugin;
		$type				= ucfirst($this->type);
		$s					= "strong";
		$style				= $this->style;
		echo "$type: {$this->msg} \n   plugin: $plugin; func: {$this->func};\n   {$this->file}; {$this->line}.\n";
	} // end anotice_cli
	private function is_cli()
	{
		return (php_sapi_name() === 'cli');
	}
}
