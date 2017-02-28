<?php
	if ( !class_exists('DemoThemeMethods') ) {
		class DemoThemeMethods {			
			public function navigation($items_array, $class) {
				$nav = '<ul class="' . $class . '">';
				
				foreach ( $items_array as $item ) {
					$nav .= '<li><a href="'. $item['url'] . '">' . $item['text'] . '</a></li>';
				}
				
				$nav .= '</ul>';
				
				return $nav;
			}
		}
	}
	
	$dtm = new DemoThemeMethods;
?>