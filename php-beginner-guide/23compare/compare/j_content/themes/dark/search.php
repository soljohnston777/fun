<?php
/* Search Page Template
 *
 * This file contains the code for a search results page. You can edit
 * the code here to change the look and feel of the search results.
 */
?>
<?php include('header.php'); ?>
<?php $term = $_GET['s']; $searches = search($term, 0, 10); print_r($searches); ?>
	<div id="content">
		<div id="main">

		</div><!--#main-->
		
		<?php include('sidebar.php'); ?>
	</div><!--#content-->

<?php include('footer.php'); ?>