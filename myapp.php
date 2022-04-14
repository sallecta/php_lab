<?php

define('Myapp', true);
define('Myapp_dir', dirname(__FILE__));
define('Myapp_dir_lib', Myapp_dir . '/myapp_lib');
define('Myapp_dir_act', Myapp_dir . '/myapp_act');

require_once(Myapp_dir_lib.'/myapp_lib_load.php');
require_once(Myapp_dir_act.'/0_myapp_act_main.php');
