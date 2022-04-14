<?php

$args = array
	(
		array('i1_tab1', 'Tab 1','<h3>Tab one content</h3><p>This is tab one paragraph</p>'),
		array('i1_tab2', 'Tab 2','<h3>Tab two content</h3><p>This is tab two paragraph</p>'),
		array('i1_tab3', 'Tab 3','<h3>Tab three content</h3><p>This is tab three paragraph</p>'),
	);
$argInstance = 'i1';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>tabs</title>
		<link rel="stylesheet" href="client/css/tabs.css">
	</head>
	<body>
	
	<!-- Tabs -->
	<div class="ui1_tabs_instance_<?php printf($argInstance);?>">
		 <!-- based on https://www.w3schools.com/howto/howto_js_tabs.asp -->
		 <!-- Tab links -->
		<div class="tab_links">
		<?php 
		foreach ($args as $tab_key => $tab_value)
		{ 
		?>
			<a class="tablink" href="<?php printf("#".$tab_value[0]);?>" id="<?php printf("tablink_".$tab_value[0]);?>"><?php printf($tab_value[1]);?></a>
		<?php
		}
		?>
		</div>
		
		<!-- Tab content -->
		<div class="tabcontent_wrapper">
		<?php foreach ($args as $tab_key => $tab_value)
		{ ?>
		
			<div id="<?php printf( $tab_value[0] ); ?>" class="tabcontent">
			  <?php printf( $tab_value[2] ); ?>
			</div>
		
		<?php 
		} ?>
		</div>
	</div>
	<!-- end ui1_tabs_instance -->
	<script src="client/js/ui1.js"></script>

	</body>
  
</html>
