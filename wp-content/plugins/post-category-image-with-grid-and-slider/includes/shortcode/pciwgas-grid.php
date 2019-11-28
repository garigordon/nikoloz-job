<?php
/**
 * 'pci-cat-grid' Shortcode
 * 
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

function pciwgas_grid_shortcode($atts, $content) { 
	// Shortcode Parameter
	$atts = extract(shortcode_atts(array(
                'size'    			=> 'full',
                'term_id' 			=> null, 
				'taxonomy'          => 'category',	
				'design'     		=> 'design-1',
				'orderby'    		=> 'name',
				'order'      		=> 'ASC',				
				'columns'    		=> '3',
				'show_title' 		=> 'true',
				'show_count'		=> 'true',
				'show_desc'  		=> 'true',
				'hide_empty' 		=> 'true',
				
        ), $atts,'pci-cat-grid'));
	
	$size 		 = !empty($size) 				? $size 					: 'full';
	$term_id 	 = (!empty($term_id)) 			? explode(',', $term_id) 	: '';	
	$taxonomy 	 = !empty($taxonomy) 			 ? $taxonomy 			    : 'category';
	$design		 = !empty($design) 				? $design 					: 'design-1';	
	$show_title	 = ($show_title == 'true') 		? true 						: false;
	$show_count	 = ($show_count == 'true') 		? true 						: false;
	$show_desc	 = ($show_desc == 'true') 		? true 						: false;
	$hide_empty  = ( $hide_empty == 'false') 	? false 		: true;
	
	$columns 	 = (!empty($columns) && $columns <= 4) ? $columns 			: 3;
	$column_grid = pciwgas_column($columns);	
	$count 			= 0;	
	
	// get terms and workaround WP bug with parents/pad counts
	$args = array(
			'orderby'    => $orderby,
			'order'      => $order,
			'include'    => $term_id,
			'hide_empty' => $hide_empty,	
			
		);

	$post_categories = get_terms( $taxonomy, $args );
	
	ob_start();
	
	if ( $post_categories ) { ?>
		<div class="pciwgas-cat-wrap pciwgas-clearfix pciwgas-<?php echo $design; ?>">			
				<?php 
			
				foreach ( $post_categories as $category ) {					
					$category_image = pciwgas_term_image($category->term_id,$size);


					$term_link = get_term_link( $category, $taxonomy );	

					$wrapper_cls = "pciwgas-pdt-cat-grid pciwgas-medium-{$column_grid} pciwgas-columns";
					$wrapper_cls .= ($count%$columns == 0) ? ' pciwgas-first' : '';	
					
					?>
				
				<div class="<?php echo $wrapper_cls; ?>">
					<div class="pciwgas-post-cat-inner">						
						<div class="pciwgas-img-wrapper">
							<?php if(!empty($category_image)) {  ?>							
								<a href="<?php echo $term_link; ?>"><img src="<?php echo $category_image; ?>"  class="pciwgas-cat-img" alt="" /></a>
							<?php }  ?>							
						</div>
						<div class="pciwgas-title">
							<?php if( $show_title && $category->name) 
							{ ?>
								<a href="<?php echo $term_link; ?>"><?php echo $category->name; ?> </a>
							<?php }
							if($show_count) { ?>
							<span class="pciwgas-cat-count"><?php echo $category->count; ?></span>
							<?php } ?>	
						</div>
						<?php if( $show_desc && $category->description ) { ?>	
							<div class="pciwgas-description">
								<div class="pciwgas-cat-desc"><?php echo $category->description; ?></div>
							</div>
						<?php } ?>	
					</div>
				</div>					
				<?php $count++; } ?>		
		</div>	
		<?php	
	}
	$content .= ob_get_clean();
	return $content;
}

add_shortcode('pci-cat-grid', 'pciwgas_grid_shortcode');