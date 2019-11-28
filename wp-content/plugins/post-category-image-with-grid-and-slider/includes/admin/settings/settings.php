<?php
/**
 * Settings Page
 *
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

global $wp_version;
?>

<div class="wrap pciwgas-settings">
<h2><?php _e( 'Category Image Settings', 'post-category-image-with-grid-and-slider' ); ?></h2><br />
<?php
if( isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true' ) {
	
	
	echo '<div id="message" class="updated notice notice-success is-dismissible">
			<p>'.__("Your changes saved successfully.", "post-category-image-with-grid-and-slider").'</p>
		  </div>';
}
?>
<form action="options.php" method="POST" id="pciwgas-settings-form" class="pciwgas-settings-form">
	
	<?php
	    settings_fields( 'pciwgas_plugin_options' );
	    global $pciwgas_options;
		$selected_cat = pciwgas_get_option('pciwgas_category',array());
	   
	   
	?>
	
	<div id="pciwgas-design-settings" class="post-box-container pciwgas-design-settings">
		<div class="metabox-holder">
			<div class="meta-box-sortables ui-sortable">
				<div id="general" class="postbox">

					<button class="handlediv button-link" type="button"><span class="toggle-indicator"></span></button>

						<!-- Settings box title -->
						<h3 class="hndle">
							<span><?php _e( 'Select categories option', 'post-category-image-with-grid-and-slider' ); ?></span>
						</h3>						
						<div class="inside">
						
						<table class="form-table pciwgaspro-design-settings-tbl">
							<tbody>
								<tr>
									<th scope="row">
										<label for="pciwgaspro-enable-author"><?php _e('Enable custom image option on selected categories', 'post-category-image-with-grid-and-slider'); ?>:</label>
									</th>									
									<td>
										<?php
										 $args = array(
												  'public' => true,												  
												); 
										 	$output = 'objects'; 
											$taxonomies = get_taxonomies( $args,$output); 
											
											foreach ( $taxonomies as $taxonomy ) {													
													?>
													<label for="<?php echo $taxonomy->name;?>">
													<input type="checkbox" id="<?php echo $taxonomy->name;?>" name="pciwgas_options[pciwgas_category][]" value="<?php echo $taxonomy->name; ?>" class="" <?php checked(in_array($taxonomy->name, $selected_cat), true ); ?>> <?php echo $taxonomy->label.' ('.$taxonomy->name.')';?></label><br />
												
											<?php }
										?>
									</td>
								</tr>
								<tr>
									<td colspan="2" valign="top" scope="row">
										<input type="submit" id="pciwgas-settings-submit" name="pciwgas-settings-submit" class="button button-primary right" value="<?php _e('Save Changes','post-category-image-with-grid-and-slider');?>" />
									</td>
								</tr>
							</tbody>
						 </table>

					</div><!-- .inside -->
				</div><!-- #general -->
			</div><!-- .meta-box-sortables ui-sortable -->
		</div><!-- .metabox-holder -->
	</div><!-- #pciwgaspro-design-settings -->
	
	<div id="pciwgas-design-settings" class="post-box-container pciwgas-design-settings">
		<div class="metabox-holder">
			<div class="meta-box-sortables ui-sortable">
				<div id="general" class="postbox">

					<button class="handlediv button-link" type="button"><span class="toggle-indicator"></span></button>

						<!-- Settings box title -->
						<h3 class="hndle">
							<span><?php _e( 'How it Work', 'post-category-image-with-grid-and-slider' ); ?></span>
						</h3>						
						<div class="inside">
						
						<table class="form-table pciwgaspro-design-settings-tbl">
							<tbody>
								<tr>
									<th scope="row">
										<label for="pciwgaspro-enable-author"><?php _e('Use the shortcode', 'post-category-image-with-grid-and-slider'); ?>:</label>
									</th>									
									<td>									

									   <p> Display categories in grid view:<br />
										[pci-cat-grid] –OR– echo do_shortcode(‘[pci-cat-grid]’);</p>

										<p>Display categories in slider view:<br />
										[pci-cat-slider] –OR– echo do_shortcode(‘[pci-cat-slider]’);</p>

									</td>
								</tr>
								
							</tbody>
						 </table>

					</div><!-- .inside -->
				</div><!-- #general -->
			</div><!-- .meta-box-sortables ui-sortable -->
		</div><!-- .metabox-holder -->
	</div><!-- #pciwgaspro-design-settings -->
	
	
</form><!-- end .pciwgaspro-settings-form -->

</div><!-- end .pciwgaspro-settings -->