<?php
/**
 * Implement theme metabox.
 *
 * @package Xmas Biz
 */

if ( ! function_exists( 'xmas_biz_add_theme_meta_box' ) ) :

	/**
	 * Add the Meta Box
	 *
	 * @since 1.0.0
	 */
	function xmas_biz_add_theme_meta_box() {

		$apply_metabox_post_types = array( 'post', 'page' );

		foreach ( $apply_metabox_post_types as $key => $type ) {
			add_meta_box(
				'xmas-biz-theme-settings',
				esc_html__( 'Single Page/Post Settings', 'xmas-biz' ),
				'xmas_biz_render_theme_settings_metabox',
				$type
			);
		}

	}

endif;

add_action( 'add_meta_boxes', 'xmas_biz_add_theme_meta_box' );

if ( ! function_exists( 'xmas_biz_render_theme_settings_metabox' ) ) :

	/**
	 * Render theme settings meta box.
	 *
	 * @since 1.0.0
	 */
	function xmas_biz_render_theme_settings_metabox( $post, $metabox ) {

		$post_id = $post->ID;
		$xmas_biz_post_meta_value = get_post_meta($post_id);

		// Meta box nonce for verification.
		wp_nonce_field( basename( __FILE__ ), 'xmas_biz_meta_box_nonce' );
		// Fetch Options list.
		$page_layout = get_post_meta($post_id,'xmas-biz-meta-select-layout',true);
		$page_image_layout = get_post_meta($post_id,'xmas-biz-meta-image-layout',true);
		echo $page_image_layout;
	?>
	<div id="xmas-biz-settings-metabox-container" class="xmas-biz-settings-metabox-container">
		<div id="xmas-biz-settings-metabox-tab-layout">
			<h4><?php echo __( 'Layout Settings', 'xmas-biz' ); ?></h4>
			<div class="xmas-biz-row-content">
				 <!-- Checkbox Field-->
				     <p>
				     <div class="xmas-biz-row-content">
				         <label for="xmas-biz-meta-checkbox">
				             <input type="checkbox" name="xmas-biz-meta-checkbox" id="xmas-biz-meta-checkbox" value="yes" <?php if ( isset ( $xmas_biz_post_meta_value['xmas-biz-meta-checkbox'] ) ) checked( $xmas_biz_post_meta_value['xmas-biz-meta-checkbox'][0], 'yes' ); ?> />
				             <?php esc_html_e( 'Check To Use Featured Image As Banner Image', 'xmas-biz' )?>
				         </label>
				     </div>
				     </p>
			     <!-- Select Field-->
			        <p>
			            <label for="xmas-biz-meta-select-layout" class="xmas-biz-row-title">
			                <?php esc_html_e( 'Single Page/Post Layout', 'xmas-biz' )?>
			            </label>
			            <select name="xmas-biz-meta-select-layout" id="xmas-biz-meta-select-layout">
				            <option value="left-sidebar" <?php selected('left-sidebar',$page_layout);?>>
				            	<?php esc_html_e( 'Primary Sidebar - Content', 'xmas-biz' )?>
				            </option>
				            <option value="right-sidebar" <?php selected('right-sidebar',$page_layout);?>>
				            	<?php esc_html_e( 'Content - Primary Sidebar', 'xmas-biz' )?>
				            </option>
				            <option value="no-sidebar" <?php selected('no-sidebar',$page_layout);?>>
				            	<?php esc_html_e( 'No Sidebar', 'xmas-biz' )?>
				            </option>
			            </select>
			        </p>

		         <!-- Select Field-->
		            <p>
		                <label for="xmas-biz-meta-image-layout" class="xmas-biz-row-title">
		                    <?php esc_html_e( 'Single Page/Post Image Layout', 'xmas-biz' )?>
		                </label>
                        <select name="xmas-biz-meta-image-layout" id="xmas-biz-meta-image-layout">
            	            <option value="full" <?php selected('full',$page_image_layout);?>>
            	            	<?php esc_html_e( 'Full', 'xmas-biz' )?>
            	            </option>
            	            <option value="left" <?php selected('left',$page_image_layout);?>>
            	            	<?php esc_html_e( 'Left', 'xmas-biz' )?>
            	            </option>
            	            <option value="right" <?php selected('right',$page_image_layout);?>>
            	            	<?php esc_html_e( 'Right', 'xmas-biz' )?>
            	            </option>
            	            <option value="no-image" <?php selected('no-image',$page_image_layout);?>>
            	            	<?php esc_html_e( 'No Image', 'xmas-biz' )?>
            	            </option>
                        </select>
		            </p>
			</div><!-- .xmas-biz-row-content -->
		</div><!-- #xmas-biz-settings-metabox-tab-layout -->
	</div><!-- #xmas-biz-settings-metabox-container -->

    <?php
	}

endif;



if ( ! function_exists( 'xmas_biz_save_theme_settings_meta' ) ) :

	/**
	 * Save theme settings meta box value.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post Post object.
	 */
	function xmas_biz_save_theme_settings_meta( $post_id, $post ) {

		// Verify nonce.
		if ( ! isset( $_POST['xmas_biz_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['xmas_biz_meta_box_nonce'], basename( __FILE__ ) ) ) {
			  return; }

		// Bail if auto save or revision.
		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}

		// Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
		if ( empty( $_POST['post_ID'] ) || $_POST['post_ID'] != $post_id ) {
			return;
		}

		// Check permission.
		if ( 'page' === $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return; }
		} else if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$xmas_biz_meta_checkbox =  isset( $_POST[ 'xmas-biz-meta-checkbox' ] ) ? esc_attr($_POST[ 'xmas-biz-meta-checkbox' ]) : '';
		update_post_meta($post_id, 'xmas-biz-meta-checkbox', sanitize_text_field($xmas_biz_meta_checkbox));

		$xmas_biz_meta_select_layout =  isset( $_POST[ 'xmas-biz-meta-select-layout' ] ) ? esc_attr($_POST[ 'xmas-biz-meta-select-layout' ]) : '';
		if(!empty($xmas_biz_meta_select_layout)){
			update_post_meta($post_id, 'xmas-biz-meta-select-layout', sanitize_text_field($xmas_biz_meta_select_layout));
		}
		$xmas_biz_meta_image_layout =  isset( $_POST[ 'xmas-biz-meta-image-layout' ] ) ? esc_attr($_POST[ 'xmas-biz-meta-image-layout' ]) : '';
		if(!empty($xmas_biz_meta_image_layout)){
			update_post_meta($post_id, 'xmas-biz-meta-image-layout', sanitize_text_field($xmas_biz_meta_image_layout));
		}
	}

endif;

add_action( 'save_post', 'xmas_biz_save_theme_settings_meta', 10, 2 );