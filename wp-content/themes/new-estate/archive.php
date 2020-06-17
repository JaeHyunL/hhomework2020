<?php 
/**
 * The archive template
 *
 * @package New-Estate
 */


get_header(); ?>

<div class="content-area container">
	<div class="col-md-12">
		<div class="archive-head">
			<h1><?php the_archive_title(); ?></h1>
		</div>
	</div>	
	<?php 
		//content loop	
		get_template_part( 'template-parts/content', 'loop' );
		//get sidebar
		get_sidebar();
	?>
</div>
<?php get_footer(); ?>