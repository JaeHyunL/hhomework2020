<?php
/**
 * Footer template
 *
 * @package New-Estate
 */
?>

<div class="footer container-fluid">
	<div class="container">		
		<div class="col-md-4 footer-one">
			<?php dynamic_sidebar( 'footone-sidebar'); ?>
		</div>
		<div class="col-md-4 footer-two">
			<?php dynamic_sidebar( 'foottwo-sidebar'); ?>
		</div>
		<div class="col-md-4 footer-three">
			<?php dynamic_sidebar( 'footthree-sidebar'); ?>
		</div>	
	</div>
</div>
<?php wp_footer(); ?>
</body><!-- body -->
</html><!-- html -->