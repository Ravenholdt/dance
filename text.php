<?php

	$h = fopen("text.txt", "r");

	if($h)
	{
		while (($data = fgetcsv($h, 1000, " ")) !== FALSE)
		{
			foreach($data as $num)
				//$number = $num;
				echo $num;
		}
		fclose($h);
	}
	echo 1;

?>
