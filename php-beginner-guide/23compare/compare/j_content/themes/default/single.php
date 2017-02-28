<?php
/* Single Page Template
 *
 * This file contains the code for a single product page. You can edit
 * the code here to change the look and feel of all the external product
 * pages you've created on the site.
 */
?>

<?php include('header.php'); ?>
	<div id="content">
		<div id="main">
			<?php if ( have_products() ) : $products = product_loop(); foreach( $products as $product ) : ?>
				<div class="post">
					<?php if ( !empty ( $product->product_image ) ): ?>
						<a href="<?php echo get_permalink($product->ID); ?>"><img class="post-image" id="post-image-<?php echo $product->ID; ?>" src="<?php echo $product->product_image; ?>" alt="<?php echo $product->product_name; ?>" /></a>
					<?php endif; ?>
					<h3><a href="<?php echo get_permalink($product->ID); ?>"><?php echo $product->product_name; ?></a></h3>
					<p class="post-meta">Category: <a href="<?php echo get_category_permalink($product->product_category); ?>"><?php echo get_category($product->product_category, 'category_name'); ?></a></p>
						<div class="entry">
							<?php echo $product->product_description; ?>
						</div><!--.entry-->
				</div><!--.post-->
				<div class="comparison">
					<h3>Price Comparison</h3>
					<?php $comparisons = get_product_comparison($product->ID); ?>
					<table id="price-comparison">
						<tr id="comparison-header">
							<th id="comparison-image-cell"></th>
							<th>Merchant</th>
							<th>Contact</th>
							<th>Price</th>
						</tr>
						<?php foreach ( $comparisons as $comparison ) : ?>
							<?php if ( !empty ( $comparison->price ) ) : ?>
								<?php $merchant = get_merchant($comparison->merchant_id); ?>
								<tr>
									<td><img class="merchant-image" class="merchant-image-<?php echo $merchant->ID; ?>" src="<?php echo $merchant->merchant_image; ?>" alt="<?php echo $merchant->merchant_name; ?>" /></td>
									<td class="merchant-name-td"><?php echo $merchant->merchant_name; ?></td>
									<td><?php echo $merchant->merchant_contact; ?></td>
									<td><p><?php echo $comparison->price; ?></p></td>
								</tr>
								<tr class="spacer"><td></td><td></td><td></td><td></td></tr>
							<?php endif; ?>
						<?php endforeach; ?>
					</table>
				</div>
			<?php endforeach; endif; ?>
		</div><!--#main-->
		
		<?php include('sidebar.php'); ?>
	</div><!--#content-->

<?php include('footer.php'); ?>