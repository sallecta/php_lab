<?php

function pluginsDirs ($argPath, $argDeep)
{
	$arrOut = array();
	function _recursive ($argPath, $argDeep, $argDeepCurrent, &$argArrOut)
	{
		if (  isset($argDeepCurrent) )
		{
			if ( $argDeepCurrent > $argDeep )
			{
				 return; // currentDeep ecseeds deep limit			 
			}
		}
		else
		{
			$argDeepCurrent=1; // first run (no recursion), set initial value to 1
		}
		// get subdirectories
		$subdirs = glob($argPath . "/*",  GLOB_ONLYDIR); 

		foreach ( $subdirs as $subDir )
		{
			// processing subdirectory
			$fname = $subDir . '/'. basename( $subDir ) . '.xml';
			if ( is_file($fname) )
			{
				//echo " $fname </br>\n";
				array_push($argArrOut, $subDir);
			}
			// end processing subdirectory
			
			// check if we need to recurse 
			if ( $argDeepCurrent <= $argDeep )
			{
				$subdirsNextTotal = count( glob($subDir . "/*",  GLOB_ONLYDIR + GLOB_NOSORT) );
				if ($subdirsNextTotal > 0)
				{
					$deepCurrentNew = $argDeepCurrent + 1;
					_recursive( $subDir, $argDeep , $deepCurrentNew, $argArrOut );					
				}
			}
		} // end foreach		
	} // end _recursive
	_recursive ($argPath, $argDeep, null, $arrOut);
	return $arrOut;
} // end pluginsDirs

$pathRoot = dirname(__FILE__) . '/j406/plugins';

$pathOfPlugins = pluginsDirs ( $pathRoot, 3);
echo "----------------------- pluginsDirs result:" . "</br>\n";
foreach ( $pathOfPlugins as $path ) {
	echo "$path " . "</br>\n";
}

//noecho 'end</br>';


?>
