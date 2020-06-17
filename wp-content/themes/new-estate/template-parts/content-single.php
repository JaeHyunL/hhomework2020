<?php
/**
 * Template part for displaying single pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package New-Estate
 */

?>

<div class="single-entry col-md-9">
	<?php
		//Post meta
		//template-hooks.php L107 to L128
		do_action( 'new_estate_postmeta' ); 
	?>				
	<div class="single-content">
		<?php 
			//Display the post content.
			the_content();

			//Displays page-links for paginated posts i.e. includes the <!--nextpage-->
			wp_link_pages();
		?>
	</div>
	<div class="single-tags clearfix">
		<?php 
			//Show Tags
			the_tags('<span>'.__( 'Tags : ', 'new-estate' ).'</span>','');
		?>
	</div>
	<?php
		//Post navigation
		//template-hooks.php L130 to L142
		do_action( 'new_estate_postnavigation' );

		//Load the comment template
		comments_template();
	?>
</div>