<?php
	if ( !class_exists('ourClass') ) {
		class ourClass {
			public $property = 'property';
			
			public function method($parameter1) {
				return $this->property . ' ' . $parameter1;
			}
		}
	}
	
	$class = new ourClass;
	echo $class->property . '<br />';
	echo $class->method('parameter');
?>