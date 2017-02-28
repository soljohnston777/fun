<?php
	if ( !class_exists('ourClass') ) {
		class ourClass {
			public $public = 'public';
			protected $protected = 'protected';
			private $private = 'private';
			
			public function method($parameter1) {
				return $this->private . ' ' . $parameter1;
			}
		}
	}
	
	if ( !class_exists('childClass') ) {
		class childClass extends ourClass {
			
			public function protected_method() {
				return $this->protected;
			}
			
			public function private_method() {
				return $this->private;
			}
		}
	}
	
	
	
	$class = new ourClass;
	$child = new childClass;
	echo $class->public . '<br />';
	echo $class->protected . '<br />';
	echo $class->private . '<br />';
	echo $class->method('parameter') . '<br />';
	
	echo $child->public . '<br />';
	echo $child->protected . '<br />';
	echo $child->private . '<br />';
	echo $child->protected_method();
	echo $child->private_method();
?>