<?php
function myapp_exit_on_dirty() { $err=error_get_last(); if($err){exit('</br>Exit: '.implode(', ',$err).'.');} }

if (   defined( 'WPINC' ) ) 	{ define( 'MYAPP_WORDPRESS', 	TRUE ); }
if ( ! defined( 'MYAPP' ) ) 	{ define( 'MYAPP', 			TRUE ); }
define( 'MYAPP_PATH', __DIR__ );

define( 'MYAPP_VERSION', eval( '?>' . file_get_contents( MYAPP_PATH . '/version.eval.php' ) ) );
myapp_exit_on_dirty();

require_once( MYAPP_PATH.'/load.php');

exit;
?>
<!DOCTYPE html>

<html>

<head>

    <title>Dynamic Drag and Drop Table Rows In PHP Mysql</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="client/external/toastr-2.1.3/toastr.css">

    <link rel="stylesheet" href="client/myapp/myapp.css">

    <style type="text/css">

        body{

            background:#d1d1d2;

        }

        .mian-section{

            padding:20px 60px;

            margin-top:100px;

            background:#fff;

        }

        .title{

            margin-bottom:50px;

        }

        .label-success{

            position: relative;

            top:20px;

        }

    </style>

</head>

<body>

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2 mian-section">

                <h3 class="text-center title">Dynamic Drag and Drop Table Rows In PHP Mysql <label class="label label-success">nicesnippets.com</label></h3>

                <table class="table table-bordered">

                    <tr>

                        <th>Id</th>

                        <th>Name</th>

                        <th>Description</th>

                    </tr>

                    <tbody class="row_position">

                    <?php

                        

                        $sql = "SELECT * FROM sorting_items ORDER BY position_order";

                        $users = $mysqli->query($sql);

                        while($user = $users->fetch_assoc()){

                    ?>

                        <tr id="<?php echo $user['id'] ?>">

                            <td><?php echo $user['id'] ?></td>

                            <td><?php echo $user['title'] ?></td>

                            <td><?php echo $user['description'] ?></td>

                        </tr>

                    <?php 

                        } 

                    ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <script src="client/external/jquery/jquery-3.2.1.js"></script>

    <script src="client/external/jquery-ui-1.12.1/jquery-ui.js"></script>

    <script src="client/external/toastr-2.1.3/toastr.js"></script>

    <script src="client/myapp/myapp.js"></script>

    <script type="text/javascript">

        $(".row_position").sortable({

            delay: 150,

            stop: function() {

                var selectedData = new Array();

                $('.row_position>tr').each(function() {

                    selectedData.push($(this).attr("id"));

                });

                updateOrder(selectedData);

            }

        });

        function updateOrder(data) {

            $.ajax({

                url:"ajax_server.php",

                type:'post',

                data:{position:data},

                success:function(data){

                    toastr.success('Your Change Successfully Saved.');

                }

            })

        }

    </script>

</body>

</html>
