<?php if ( ! defined( 'MYAPP' ) ) { exit('exit'); } 
if ( ! defined( 'MYAPP' ) ) { exit; }

    // Include Connection File 

    require('db_config.php');


    $position = $_POST['position'];


    $i=1;


    // Update Orting Data 

    foreach($position as $k=>$v){


        $sql = "Update sorting_items SET position_order=".$i." WHERE id=".$v;


        $mysqli->query($sql);


        $i++;

    }

?>
