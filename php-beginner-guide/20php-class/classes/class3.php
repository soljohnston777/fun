<?php
	if ( !class_exists('ourClass') ) {
		class ourClass {
			
			public function __construct($parameter1, $parameter2) {
				echo $parameter1 . ' ' . $parameter2;
			}
		}
	}
	
	$class = new ourClass('param1', 'param2');
?>