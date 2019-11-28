<?php
/**
 * Add form field
 *
 * @package PowerPack
 * @subpackage Post Category Image With Grid and Slider
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

 $prefix = PCIWGAS_META_PREFIX; // Taking metabox prefix
?>

<div class="form-field pciwgas-term-img-wrap">
    <label for="pciwgas-thumb"><?php _e('Choose Category Image', 'pwpc'); ?></label>      
	<input type="button" name="pwpc_pcimg_url_btn" id="pciwgas-thumb" class="button button-secondary pciwgas-image-upload" value="<?php _e( 'Upload Image', 'pwpc'); ?>" /> <input type="button" name="pwpc_pcimg_url_clear" id="pciwgas-catimage-url-clear" class="button button-secondary pciwgas-image-clear pciwgas-image-clear" value="<?php _e( 'Clear', 'pwpc'); ?>" /> <br/>
	
    <input type="hidden" name="<?php echo $prefix; ?>cat_thumb_id" value="" class="pciwgas-cat-thumb-id pciwgas-thumb-id" />
	<p class="description"><?php _e( 'Upload / Choose category image.', 'pwpc' ); ?></p>
	<div class="pciwgas-img-preview pciwgas-img-view pciwgas-img-view"></div>
</div>