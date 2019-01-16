<?php
	for($g = 4; $g >= 0; $g--){
		for($a = 1; $a <= 2; $a++){
		  	echo  "$g" ; 
		}
 		for ($i = $g+2; $i > $g+1; $i--) {  
			for ($j = 1; $j < $i ; $j++) { 
				echo "$i";
			}		
		}
			echo "<br>";	
	}
?>	