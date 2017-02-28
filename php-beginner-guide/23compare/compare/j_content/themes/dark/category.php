<?php
/* Category Page Template
 *
 * This file contains the code for a product category page. You can edit
 * the code here to change the look and feel of all the external product
 * category pages you've created on the site.
 */
?>
<?php include('header.php'); ?>
	<div id="content">
		<div id="main">
			<h2>Category: <?php echo get_cat_title($c); ?></h2>
			<?php if ( have_products() ) : $products = product_loop(); foreach( $products as $product ) : ?>
				<div class="post">
					<?php if ( !empty ( $product->product_image ) ): ?>
						<a href="<?php echo get_permalink($product->ID); ?>"><img class="post-image" id="post-image-<?php echo $product->ID; ?>" src="<?php echo $product->product_image; ?>" alt="<?php echo $product->product_name; ?>" /></a>
					<?php endif; ?>
					<h3><a href="<?php echo get_permalink($product->ID); ?>"><?php echo $product->product_name; ?></a></h3>
					<p class="post-meta">Category: <a href="<?php echo get_category_permalink($product->product_category); ?>"><?php echo get_category($product->product_category, 'category_name'); ?></a></p>
						<div class="entry">
							<?php echo get_excerpt($product->product_description, '50'); ?>
						</div><!--.entry-->
				</div><!--.post-->
				<div class="readmore">
					<p><a href="<?php echo get_permalink($product->ID); ?>">View Full Product Price Comparison &raquo;</a></p>
				</div>
			<?php endforeach; endif; ?>
		</div><!--#main-->
		
		<?php include('sidebar.php'); ?>
	</div><!--#content-->

<?php include('footer.php'); ?>