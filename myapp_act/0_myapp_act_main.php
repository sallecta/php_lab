<?php if ( ! defined( 'Myapp' ) ) { exit("direct execution prevented\n"); }

global $tr, $trp;
$tr = function ($arg) { Translate_sallecta::tr($arg); };
$trp = function ($arg) { Translate_sallecta::tre($arg); };

global $myapp;
$myapp = new Myapp_main( array('settings_file'=>Myapp_dir.'/myapp_settings.eval.php',) );

