<?php
	$alias = '- alias: ';
	// + data from database
	$trigger = ''; 
	// + data from database
	$automation = '';
	// + data from database
	
	$new_alias = $alias . '\n' . $trigger . '\n' . $automation . '\n'; 
	 
	$old_data = '';
    // load the data and delete the line from the array 
    $lines = fopen('C:\xampp\htdocs\Configuration.yaml', 'r'); 
	$old_data = '';
	
	for ($i=0; $i < 133; $i++) {
		$line = fgets($lines);
		#if ($line != 0) {
		$old_data .= $line;
		#}
		}
	
	$old_data .= $new_alias;
		
    $fp = fopen('C:\xampp\htdocs\Configuration.yaml', 'w'); 
    fwrite($fp, $old_data); 
    fclose($fp); 	
?>
