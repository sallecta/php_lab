<?php if ( ! defined( 'MYAPP' ) ) { exit('exit'); } 

/* include external libraries */
require_once( MYAPP_PATH.'/server/lib/anotice/anotice.php' );
require_once( MYAPP_PATH.'/server/lib/tr/tr.php' );

/* include local libraries */
require_once( MYAPP_PATH.'/server/lib/Myapp_db/Myapp_db.php' );
require_once( MYAPP_PATH.'/server/lib/Myapp_interact/Myapp_interact.php' );
/* main loal library*/
require_once( MYAPP_PATH.'/server/lib/Myapp_0/Myapp_0.php' );



/* main program */
require_once( MYAPP_PATH . '/server/app/app.php' );
