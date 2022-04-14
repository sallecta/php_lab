<?php if ( ! defined( 'MYAPP' ) ) { exit('exit'); }

global $myapp;
$db_conf_fname = MYAPP_PATH . '/server/app/settings/db_conf(ignore).eval.php';
$myapp = new Myapp_0( MYAPP_VERSION,  $db_conf_fname );

$myapp->db->connection_test();
$myapp->inter->request_check();
new anotice('info',tr('om'));
