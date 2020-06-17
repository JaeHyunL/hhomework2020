<?php
add_action( 'admin_menu', 'new_estate_admin_menu' );

function new_estate_admin_menu() {

if (is_admin() && isset($_GET['activated'])){

    wp_redirect(admin_url("themes.php?page=pro-upgrade"));
}
	add_theme_page( 'Upgrade To PRO', 'Upgrade To PRO', 'manage_options', 'pro-upgrade', 'new_estate_admin_page');

}

function new_estate_admin_page(){
	?>
	<style type="text/css">
	.col-1-2 { width: 50%; float: left; text-align: left;}
	img {width: 100%;}
	.wrap h2.page-title { margin: 0 0 20px 0; font-size: 40px; font-weight: bold; text-align: center;}
	ul {margin: 0; padding: 20px 40px;}
	ul li {font-weight: bold;list-style: square;}
	ul li ul li { font-weight: normal;}
	ul ul { padding: 0 20px;}
	.butt li {list-style: none;}
	.padded h1 { padding: 0 40px}
	.aligncenter {text-align: center; padding: 20px 0;}
	a.demo {text-decoration: none; border-radius: 5px; background: #fff; color: #000; padding: 10px 15px;}
	a.buy {text-decoration: none; border-radius: 3px; background: red; color: #fff; padding: 10px 15px; margin-left: 10px;}
	a.support {text-decoration: none; border-radius: 3px; background: #000; color: #fff; padding: 10px 15px; margin-left: 10px;}

	li a {}
	</style>
	<div class="wrap">
		<h2 class="page-title">Upgrade to New Estate PRO</h2>
		<div class="aligncenter"><i>Use the discount code " <b>10PERCENTOFF</b> " & get 10% OFF today</i></div>
		<div class="col-1-2">
			<img src="http://www.ammuthemes.com/wp-content/uploads/2017/07/pro-image-Copy.png">
		</div>

		<div class="col-1-2 padded">
		<h1>Benefit of upgrade to Pro Version</h1>
		<ul>
			<li>More Customization Options</li>
			<li>Elegant & detailed slider</li>
			<li>Integretated header section</li>
			<li>Submit button on header to ease submission</li>
			<li>Dedicated plugin for property management</li>
			<li>Property map for easy access</li>
			<li>Property filter to easy navigation</li>
			<li>Well desined property list</li>
			<li>Custom widgets with necessary sidebars</li>
			<li>24 x 7 dedicated support</li>
			<li>Dedicated support forum</li>
			<li>10% Discount on all purchase</li>
		</ul>
			<ul class="butt"><li>
				<a class="demo" target="_blank" href="http://www.ammuthemes.com/demo/?demo=new-estate-pro">Live Demo</a>
				<a class="buy" target="_blank" href="http://www.ammuthemes.com/downloads/new-estate-pro/">Upgrade Now</a>
			</li></ul>
		</div>
	</div>
<?php 

}