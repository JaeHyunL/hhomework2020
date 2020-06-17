<?php
/**
 * Template part for index and archive loop
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package New-Estate
 */

?>

<div class="single-index-content col-md-9">
	<?php /* Start the Loop */ ?>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div <?php post_class('single-index'); ?>>
				<div class="index-single-post">
					<?php if ( has_post_thumbnail() ) the_post_thumbnail('new-estate-index');?><!-- thumbnail picture -->
					<?php 
						//Incex post meta
						//template-hooks.php L147 to L166
						do_action( 'new_estate_index_postmeta' );
					?>
				</div>
			</div>
		<?php endwhile;	?>
	<?php endif; ?>		
	<?php 
		//Pagination
		//template-hooks.php L168 to L177
		do_action( 'new_estate_index_pagination' );
	?>
</div>