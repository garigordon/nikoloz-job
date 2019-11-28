<?php
/**
 * 'pci-cat-slider' Shortcode
 * 
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

function pciwgas_slider_shortcode($atts, $content) { 
	// Shortcode Parameter
	$atts = extract(shortcode_atts(array(
                'size'    			=> 'full',
                'term_id' 			=> null, 
				'taxonomy'          => 'category',	
				'design'     		=> 'design-1',
				'orderby'    		=> 'name',
				'order'      		=> 'ASC',				
				'show_title' 		=> 'true',
				'show_count'		=> 'true',
				'show_desc'  		=> 'true',
				'hide_empty' 		=> 'true',
				'slidestoshow' 		=> '3',
				'slidestoscroll' 	=> '1',
				'loop' 				=> 'true',
				'dots'     			=> 'true',
				'arrows'     		=> 'true',
				'autoplay'     		=> 'false',
				'autoplay_interval' => '3000',
				'speed'             => '300',
				'rtl'				=> '',
				
        ), $atts,'pci-cat-slider'));
		
	$unique				 = pciwgas_get_unique();
	$size 				 = !empty($size) 				? $size 					: 'full';
	$term_id 	 		 = (!empty($term_id)) 			? explode(',', $term_id) 	: '';	
	$design				 = !empty($design) 				? $design 					: 'design-1';	
	$taxonomy 	 		 = !empty($taxonomy) 			        ? $taxonomy 			    : 'category';
	$show_title	 		 = ($show_title == 'true') 		? true 						: false;
	$show_count	 		 = ($show_count == 'true') 		? true 						: false;
	$show_desc			 = ($show_desc == 'true') 		? true 						: false;
	$hide_empty  		 = ( $hide_empty == 'false') 	? false 					: true;
	$slidestoshow 		 = !empty($slidestoshow) 			? $slidestoshow 						: 3;
	$slidestoscroll 	 = !empty($slidestoscroll) 			? $slidestoscroll 						: 1;
	$loop 				 = ( $loop == 'false' ) 				? 'false' 								: 'true';
	$dots 				 = ( $dots == 'false' ) 				? 'false' 								: 'true';
	$arrows 			 = ( $arrows == 'false' ) 			? 'false' 								: 'true';
	$autoplay 			 = ( $autoplay == 'false' ) 			? 'false' 								: 'true';
	$autoplay_interval   = (!empty($autoplay_interval)) 		? $autoplay_interval 					: 3000;
	$speed 				 = (!empty($speed)) 					? $speed 								: 300;	
	
	// For RTL
	if( empty($rtl) && is_rtl() ) {
		$rtl = 'true';
	} elseif ( $rtl == 'true' ) {
		$rtl = 'true';
	} else {
		$rtl = 'false';
	}
	
	// Enqueue required script
	wp_enqueue_script( 'wpos-slick-jquery' );
	wp_enqueue_script( 'pciwgas-public-script' );
	
	// get terms and workaround WP bug with parents/pad counts
	$args = array(
			'orderby'    => $orderby,
			'order'      => $order,
			'include'    => $term_id,
			'hide_empty' => $hide_empty,	
			
		);

	$post_categories = get_terms( $taxonomy, $args );
	// Slider configuration
	$slider_conf = compact('slidestoshow', 'slidestoscroll', 'loop', 'dots', 'arrows', 'autoplay', 'autoplay_interval', 'speed', 'rtl');
	
	ob_start();
	
	if ( $post_categories ) { ?>
		<div class="pciwgas-cat-wrap pciwgas-cat-wrap-slider pciwgas-clearfix pciwgas-<?php echo $design; ?>">
			<div id="pciwgas-<?php echo $unique; ?>" class="pciwgas-cat-slider-main" >
				<?php 
				
				foreach ( $post_categories as $category ) {					
					$category_image = pciwgas_term_image($category->term_id,$size);

													
					$term_link = get_term_link( $category, $taxonomy );				
					
					?>
				
				<div class="pciwgas-pdt-cat-slider">
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
				<?php } ?>				
			</div>
			<div class="pciwgas-slider-conf" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>"></div>	
		</div>	
		<?php	
	}
	$content .= ob_get_clean();
	return $content;
}

add_shortcode('pci-cat-slider', 'pciwgas_slider_shortcode');