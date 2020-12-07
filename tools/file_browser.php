 
<?php
$dirCurrent=dirname($_SERVER['SCRIPT_FILENAME']);
$uriRel=dirname($_SERVER['SCRIPT_NAME']);
if ($uriRel == '/') {
  $uriRel='';
}
echo '<p>dirCurrent is '. $dirCurrent.'</p>';
echo '<p>uriRel is '. $uriRel.'</p>';
$uriParent=dirname($_SERVER['SCRIPT_NAME'],2);
echo '<p>uriParent is '. $uriParent.'</p>';

$itemnum = 1;
echo '<p>0) <a href="'.$uriParent.'">..</a></p>';
foreach(scandir($dirCurrent) as $item){
    if (!($item == '.')) {
        if (!($item == '..')) {
			 $link=$uriRel.'/'.$item;
			 if (is_dir($dirCurrent.'/'.$item)){
				 echo '<p>'.$itemnum.') <a href="'.$link.'">[] '.$item.'</a></p>';
			 }
			 else {
				echo '<p>'.$itemnum.') <a href="'.$link.'">'.$item.'</a></p>';
				}
             $itemnum = ($itemnum + 1);
}}}
?>