<?php
/**
 * @see Woocommerce Custom Product Function
 * @author VNMilky
 */
if(!function_exists('danlet_woocommerce_template_single_related_product')){
	function danlet_woocommerce_template_single_related_product(){
		global $product;

		if ( empty( $product ) || ! $product->exists() ) {
			return;
		}
		$posts_per_page = 10;
        $related = wc_get_related_products(get_the_ID());
		if ( ! $related ) {
			return;
		}
		$args = apply_filters( 'woocommerce_related_products_args', array(
			'post_type'            => 'product',
			'ignore_sticky_posts'  => 1,
			'no_found_rows'        => 1,
			'posts_per_page'       => $posts_per_page,
			'orderby'              => 'rand',
			'post__in'             => $related,
		) );
		$products                  = new WP_Query( $args );
        wp_reset_postdata();
        if ( $products->have_posts() ) :
?>
        <h3 class="acd_shop_product_title "><?php echo esc_html__('More Products','danlet')?></h3>
            <div class="acd_shop_product_box">
                <div data-acd="swiper-related" class="swiper-shop-vm">
                <div class="swiper-wrapper">

                <?php

    			while ( $products->have_posts() ) : $products->the_post();
    					$attachment_ids = $product->get_gallery_image_ids();
    				?>
    				<div class="swiper-slide" data-swiper-autoplay="2000">
    					<div class="acd_shop_product_img">
    					<?php if ( has_post_thumbnail() ) {
    						$img_thumbnail = get_the_post_thumbnail_url( $products->ID,'shop_single');
    					}
    					else {
    						$img_thumbnail = wp_get_attachment_image_url($attachment_ids[0],'shop_single');
    					}
    						echo sprintf('<img src="%s" alt="%s">',$img_thumbnail,get_the_title());
    					?>
    					</div>
    					<div class="acd_shop_product_content">
    						<h4 class="acd_shop_product_name">
    							<a href="<?php echo get_the_permalink() ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
    						</h4>
    						<p class="acd_shop_product_price">
    							<?php echo danlet_print_html($product->get_price_html()); ?>
    						</p>
    					</div>
    	            </div>
    				<?php
    			endwhile;
            ?>
            </div>

            </div>
            <div data-btn="btn-next-product" class="acd_btn_next"></div>
            <div data-btn="btn-prev-product" class="acd_btn_prev"></div>
        </div>
        <script>
            (function(){
            'use strict';
                var swiper = new Swiper('div[data-acd="swiper-related"]', {
                    slidesPerView: 4,
                    paginationClickable: true,
                    nextButton: 'div[data-btn="btn-next-product"]',
                    prevButton: 'div[data-btn="btn-prev-product"]',
                    spaceBetween: 30,
                    loop: true,
                    speed:3000
                });
            })(jQuery)
        </script>

<?php
        endif;
	}
}
add_filter( 'woocommerce_product_review_comment_form_args', 'danlet_woocommerce_product_review_comment_form_placeholder');
if(!function_exists('danlet_woocommerce_product_review_comment_form_placeholder')){
	function danlet_woocommerce_product_review_comment_form_placeholder($comment_form) {

		$comment_form['fields']['author'] = '<p class="author text-16x col-md-6 col-sm-6 col-xs-12"><input id="author" name="author" placeholder="'.esc_html__('Your name *','danlet').'" class="txt-form" type="text" value="" aria-required="true"  required="" ></p>';
		$comment_form['fields']['email'] = '<p class="email text-16x col-md-6 col-sm-6 col-xs-12"><input id="email-f" name="email" placeholder="'.esc_html__('Your Email *','danlet').'" class="txt-form" type="text" value="" aria-required="true"  required="" ></p>';
		if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
			$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'danlet' ) . '</label><select name="rating" id="rating" aria-required="true" required>
				<option value="">' . esc_html__( 'Rate&hellip;', 'danlet' ) . '</option>
				<option value="5">' . esc_html__( 'Perfect', 'danlet' ) . '</option>
				<option value="4">' . esc_html__( 'Good', 'danlet' ) . '</option>
				<option value="3">' . esc_html__( 'Average', 'danlet' ) . '</option>
				<option value="2">' . esc_html__( 'Not that bad', 'danlet' ) . '</option>
				<option value="1">' . esc_html__( 'Very poor', 'danlet' ) . '</option>
			</select></p>';
		}
		$comment_form['comment_field'] .= '<p class="comment-form-comment text-16x"><textarea id="comment" class=" txt-form" name="comment" cols="45" rows="8" placeholder="'.esc_html__('Your comment *','danlet').'" aria-required="true" required></textarea></p>';

		$comment_form['label_submit'] = esc_html__('Submit comment','danlet');

		return $comment_form;
	}
}
add_filter( 'woocommerce_product_tabs', 'danlet_woocommerce_output_product_data_tabs_remove_desc', 98 );
if(!function_exists('danlet_woocommerce_output_product_data_tabs_remove_desc')) {
	function danlet_woocommerce_output_product_data_tabs_remove_desc( $tabs ) {
	    unset( $tabs['description'] );
	    unset( $tabs['additional_information'] );
	    return $tabs;
	}
}

if(!function_exists('danlet_woocommerce_output_product_data_tabs_before')) {
	function danlet_woocommerce_output_product_data_tabs_before() {
		?>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<?php
	}
}
if(!function_exists('danlet_woocommerce_output_product_data_tabs_after')) {
	function danlet_woocommerce_output_product_data_tabs_after() {
		?>
		</div>
		<?php
	}
}
if(!function_exists('danlet_woocommerce_template_single_excerpt')) {
	function danlet_woocommerce_template_single_excerpt() {
		?>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="acd_shop_detail_desc acd_shop_detail_desc_pd">
				<h4 class="acd_shop_detail_desc_title">
					<?php echo esc_html__('Detail','danlet')?>
				</h4>
				<div class="acd_shop_detail_desc_text">
				 <?php woocommerce_template_single_excerpt(); ?>
				</div>
			</div>
		</div>
		<?php
	}
}

if(!function_exists('danlet_woocommerce_template_single_related_after')) {
	function danlet_woocommerce_template_single_related_after() {
		?>
		<section class="acd_shop_detail_more_product">
			<div class="container">
				<div class="row">
		<?php
	}
}
if(!function_exists('danlet_woocommerce_template_single_related_before')) {
	function danlet_woocommerce_template_single_related_before() {
		?>	 </div>
			</div>
		</section>
		<?php
	}
}
if(!function_exists('danlet_woocommerce_template_single_detail_after')) {
	function danlet_woocommerce_template_single_detail_after() {
		?>
		<section class="acd_shop_detail_tw_info">
			<div class="container">
				<div class="row">
		<?php
	}
}
if(!function_exists('danlet_woocommerce_template_single_detail_before')) {
	function danlet_woocommerce_template_single_detail_before() {
		?>
				</div>
			</div>
		</section>
		<?php
	}
}
if(!function_exists('danlet_woocommerce_template_single_add_to_cart')){
	function danlet_woocommerce_template_single_add_to_cart(){
		global $product;
		?><div class="acd_shop_detail_number"><?php
		do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart' );
		?></div><?php
	}
}
if(!function_exists('danlet_woocommerce_template_single_attr')) {
	function danlet_woocommerce_template_single_attr() {
		global $woocommerce, $post, $product;
		$has_row    = false;
		$attributes = $product->get_attributes(); ?>
		<div class="acd_shop_detail_size">
		<?php foreach ( $attributes as $attribute ) :
		if ( empty( $attribute['is_visible'] ) || ( $attribute['is_taxonomy'] && ! taxonomy_exists( $attribute['name'] ) ) )
			continue;
		$values = wc_get_product_terms( $product->id, $attribute['name'], array( 'fields' => 'names' ) );
		beau_dump($values);

			foreach ($values as $key => $value) {
				$att_val[] = '<li>'.$value.'</li>';
		}
		if( empty( $att_val ) )
			continue;
		$has_row = true; ?>
			<p><?php echo wc_attribute_label( $attribute['name'] ); ?></p>
			<ul class="acd_shop_detail_list_size">
				<?php echo implode('',$att_val); ?>
			</ul>
		<?php endforeach; ?>
		</div>
		<?php
	}
}
if(!function_exists('danlet_woocommerce_template_single_rating_before')) {
	function danlet_woocommerce_template_single_rating_before() {
		?>
		<div class="acd_shop_detail_rate">
		<?php
	}
}
if(!function_exists('danlet_woocommerce_template_single_rating_after')) {
	function danlet_woocommerce_template_single_rating_after() {
		?>
		</div>
		<?php
	}
}
if(!function_exists('danlet_woocommerce_template_single_price')) {
	function danlet_woocommerce_template_single_price() {
		global $product; ?>
	<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
	<p class="acd_shop_detail_price"><?php echo danlet_print_html($product->get_price_html()); ?></p>
	<meta itemprop="price" content="<?php echo esc_attr( wc_get_price_to_display($product) ); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo esc_attr($product->is_in_stock() ? 'InStock' : 'OutOfStock'); ?>" />
		</div><?php
	}

}
if(!function_exists('danlet_woocommerce_single_product_summary_title')) {
	function danlet_woocommerce_single_product_summary_title() {
		?>
		<h2 class="acd_shop_detail_name"><?php echo get_the_title() ?></h2>
		<?php
	}
}
if(!function_exists('danlet_woocommerce_single_product_summary_before')) {
	function danlet_woocommerce_single_product_summary_before() {
		?>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="acd_shop_detail_content">
		<?php
	}
}
if(!function_exists('danlet_woocommerce_single_product_summary_after')) {
	function danlet_woocommerce_single_product_summary_after() {
		?>
			</div>
		</div>
		<?php
	}
}
if(!function_exists('danlet_woocommerce_show_product_detail')){
	function danlet_woocommerce_show_product_detail() {
		global $post, $product;
		$attachment_ids = $product->get_gallery_image_ids();
		$img_thumbnail = '';
		?>
        <?php if ( has_post_thumbnail() ) {?>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="acd_shop_detail_img">
					<div class="acd_shop_detail_img_big">
					<?php if ( has_post_thumbnail() ) {
						$img_thumbnail = get_the_post_thumbnail_url( $post->ID,'shop_single');
					}
					else {
						if ( $attachment_ids ) {
						$img_thumbnail = wp_get_attachment_image_url($attachment_ids[0],'shop_single');
						}
					}
						if($img_thumbnail != NULL) {
							echo sprintf('<img src="%s" alt="%s">',$img_thumbnail,get_the_title());
						}
					?>
					</div>
					<ul class="acd_shop_detail_img_list">
					<?php

						if ( $attachment_ids ) {
							foreach ( $attachment_ids as $attachment_id ) {
								$props   	=  wc_get_product_attachment_props( $attachment_id);
								$props_thumb  = wp_get_attachment_image_url($attachment_id,'shop_thumbnail');
								$props_url  = wp_get_attachment_image_url($attachment_id,'shop_single');
								if ( ! $props['url'] ) {
										continue;
									}
								echo sprintf('<li><img src="%s" data-image="%s" alt="%s" width="80px" height="80px"></li>',$props_thumb,$props_url,$props['alt']).PHP_EOL;
							}
						}

					?>
					</ul>
					<script>
                            (function($){
                                "use strict";
                                $('.acd_shop_detail_img_list img').on('click' ,function(event) {
									$('.acd_shop_detail_img_big img').hide('fast');
                                    var imgUrl = $(this).attr('data-image')
                                    $('.acd_shop_detail_img_big img').attr('src',imgUrl);
									$('.acd_shop_detail_img_big img').show('fast');
                                });
                            })(jQuery)
                        </script>
				</div>
			</div>
		<?php
        }
	}
}
if(!function_exists('danlet_woocommerce_after_single_product_svg')) {
	function danlet_woocommerce_after_single_product_svg() {
        if (get_the_post_thumbnail_url() == true) {
		?>
    		<svg class="acd_left_top_svg" viewBox="0 0 1920 175" preserveAspectRatio="none" width="100%" height="175">
    		  	<polygon points="0 175,1920 175,0 0" class="acd_white fill"  ></polygon>
    		</svg>
    		<?php
        }
	}

}

/**
 * @see Woocommerce Custom Function
 * @author VNMilky
 */
if(!function_exists('danlet_woocommerce_header_cart')){
    function danlet_woocommerce_header_cart() {
        global  $woocommerce,$product;

        $count = $woocommerce->cart->cart_contents_count;
        ?>
        <i class="fa fa-calendar-o" aria-hidden="true"></i>
        <span class="acd_number_on_cart"><?php echo esc_attr($count)?></span>
            <div class="acd_header_cart">
                <h3 class="title_show_cart"><?php esc_html_e('SHOPPING CART','danlet') ?></h3>
                <ul class="acd_show_cart">
                <?php
                    $data = $woocommerce->cart;
                    $data = $data->cart_contents;
                    foreach ($data as $x => $s) :
                    $_product = wc_get_product( $s['product_id'] );
                ?>
                    <li>
                        <?php if (get_the_post_thumbnail_url($_product->get_id())): ?>
                            <div class="on_cart_img show_product_on_cart">
                        		<a href="<?php echo get_permalink($s['product_id'])?>" title="<?php echo get_the_title($s['product_id'])?>">
	                                <img src="<?php echo get_the_post_thumbnail_url($s['product_id'],'shop_thumbnail')?>" alt="shoes">
	                            </a>
                            </div>
                        <?php endif ?>
                        <div class="on_cart_content show_product_on_cart">
                            <h4 class="title_on_cart">
                                <a href="<?php echo get_permalink($s['product_id'])?>" title="<?php echo get_the_title($s['product_id'])?>"><?php echo get_the_title($s['product_id'])?></a>
                            </h4>
                            <span class="price_on_cart"><?php echo danlet_print_html($_product->get_price_html());?>
                            </span>
                            <span class="quantity_on_cart"><?php esc_html_e('x','danlet') ?> <?php echo danlet_print_html($s['quantity']); ?></span>
                        </div>
                        <span data-product="<?php echo esc_attr($s['product_id'])?>" data-header-cart="remove_item_wcm" class="delete_number_on_cart"><?php esc_html_e('x','danlet') ?></span>
                    </li>
                <?php endforeach;?>
                </ul>

                <ul class="total_on_cart">
                    <li><?php esc_html_e('Total','danlet') ?></li>
                    <li><?php echo WC()->cart->get_cart_total(); ?></li>
                </ul>
                <ul class="acd_vc">
                    <li class="vc_on_cart">
                        <a href="<?php echo WC()->cart->get_cart_url(); ?>" title="view cart">
                           <?php esc_html_e('View cart','danlet') ?>
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="checkout_on_cart">
                        <p>
                            <a href="<?php echo WC()->cart->get_checkout_url(); ?>" title="<?php esc_html_e('Process to checkout','danlet') ?>"><?php esc_html_e('Process to checkout','danlet') ?></a>
                        </p>
                    </li>
                </ul>
            </div>
        <?php

    }
}
if(!function_exists('danlet_woocommerce_pagination')) {
	function danlet_woocommerce_pagination(){
		global $wp_query;
		if ( $wp_query->max_num_pages <= 1 ) {
			return;
		}
		$pages = paginate_links( array(
	        'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
	        'format' => '',
	        'add_args'     => false,
	        'current'      => max( 1, get_query_var( 'paged' ) ),
	        'total' => $wp_query->max_num_pages,
	        'prev_text'    => '&larr;',
	        'next_text'    => '&rarr;',
	        'end_size'     => 3,
	        'type'  => 'array',
	        'mid_size'     => 3
	    ) );
    	if( is_array( $pages ) ) {
        	$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        	echo '<div class="acd_pagination"><ul class="acd_pagination_list">';
        	foreach ( $pages as $page ) {
                	echo "<li>$page</li>";
        	}
       	echo '</ul></div>';
        }
	}
}
if(!function_exists('danlet_woocommerce_template_loop_price')) {
	function danlet_woocommerce_template_loop_price() {
		global $product;
		$price_html 	= '<div class="acd_shop_price">';
		$price_html		.=	$product->get_price_html();
		$price_html 	.= '</div>';
		echo danlet_print_html($price_html);
	}

}
if(!function_exists('danlet_woocommerce_shop_loop_item_title_product')) {
	function danlet_woocommerce_shop_loop_item_title_product() {
		?>
		<h3 class="acd_shop_name">
			<a href="<?php echo get_the_permalink() ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
		</h3>
		<?php

	}
}
if(!function_exists('danlet_woocommerce_shop_loop_item_title_rating')) {
	function danlet_woocommerce_shop_loop_item_title_rating() {
		global $product;
		if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' )
			return;
		$rating_html = '';
		$rating = $product->get_average_rating();
		if ( $rating > 0 ) {
			$rating_html  = '<div class="acd_shop_rate star-rating" title="' . esc_html__( 'Rated', 'danlet' ).esc_attr($rating).esc_html__('out of 5','danlet') . '">';
			$rating_html .= '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"><strong class="rating">' . $rating . '</strong> ' . esc_html__( 'out of 5', 'danlet' ) . '</span>';
			$rating_html .= '</div>';
		}
		else {
			$rating_html = '<div class="acd_shop_rate star-rating" title="'.esc_html__('Rated 0 out of 5','danlet').'"><span style="width:0%"><strong class="rating">0</strong>'.esc_html__('out of 5','danlet').'</span></div>';
		}

		echo danlet_print_html($rating_html);
	}
}
if(!function_exists('danlet_woocommerce_shop_loop_item_title_before')) {
	function danlet_woocommerce_shop_loop_item_title_before() {
		?>
		<div class="acd_shop_content">
		<?php
	}
}
if(!function_exists('danlet_woocommerce_shop_loop_item_title_after')) {
	function danlet_woocommerce_shop_loop_item_title_after() {
		?>
		</div>
		<?php
	}
}
if(!function_exists('danlet_show_product_loop_sale_flash')) {
	function danlet_show_product_loop_sale_flash(){
		global $post, $product;
		if ( $product->is_on_sale() ) :
		echo apply_filters( 'woocommerce_sale_flash', '<span class="acd_shop_sale">' . esc_html__( 'Sale ', 'danlet' ) . '</span>', $post, $product );
		endif;
	}
}
if(!function_exists('danlet_woocommerce_before_shop_loop_item')) {
	function danlet_woocommerce_before_shop_loop_item(){
		global $product;
		$check_img = "no_images";
		if ( $product ) :
            if(get_the_post_thumbnail() != '') :
		          echo get_the_post_thumbnail(get_the_ID(),'shop_single');
		      	$check_img = "have_images";
            endif;?>

		<!-- add_to_cart -->
		<div class="acd_shop_addtocart <?php echo esc_attr($check_img) ?>">
			<a href="<?php echo esc_url($product->add_to_cart_url()) ?>" data-quantity="<?php echo esc_attr(isset($quantity)?$quantity:1)?>" data-product_id="<?php echo esc_attr(get_the_ID())?>" data-product_sku="<?php echo esc_attr($product->get_sku())?>" title="<?php echo esc_attr($product->add_to_cart_text())?>">
				<?php echo esc_attr($product->add_to_cart_text())?>
			</a>
		</div>
		<!-- end add_to_cart -->
		<?php
		endif;
	}
}
if(!function_exists('danlet_woocommerce_before_shop_loop_item_before')) {
	function danlet_woocommerce_before_shop_loop_item_before() {
		?>
	<!-- shop-image -->
	<div class="acd_shop_img">
		<?php
	}
}
if(!function_exists('danlet_woocommerce_before_shop_loop_item_after')) {
	function danlet_woocommerce_before_shop_loop_item_after() {
		?>
	</div>
	<!-- end shop-image -->
		<?php
	}
}
if(!function_exists('danlet_woocommerce_before_shop_loop')) {
	function danlet_woocommerce_before_shop_loop(){
		?>
		<div class="row">
		<?php
	}
}
if(!function_exists('danlet_woocommerce_after_shop_loop')){
	function danlet_woocommerce_after_shop_loop(){
		?>
		</div>
		<?php
	}
}
if(!function_exists('danlet_woocommerce_output_content_wrapper')) {
	function danlet_woocommerce_output_content_wrapper() {
		if(is_shop()== false) {
            $extra_class = "";
            if (!has_post_thumbnail()) {
                $extra_class = "no-feature-image";
            }
		?>
		<section class="acd_shop_detail_info <?php echo esc_attr($extra_class);?>">
			<div class="container">
		<?php
		} else {
			?>
		<section class="acd_shop">
			<div class="container">
			<?php
		}
	}
}
if(!function_exists('danlet_woocommerce_output_content_wrapper_end')) {
	function danlet_woocommerce_output_content_wrapper_end() {
		?>
			</div>
		</section>
		<?php
	}
}
/**
 * [danlet_woocommerce_category description]
 * @return [html]
 */
if(!function_exists('danlet_woocommerce_category')) {
	function danlet_woocommerce_category(){
		global $wp_query;
		$id_shop = '';
		if(is_shop()== false) {
			$id_shop = $wp_query->get_queried_object()->term_id;
		}
		$category = get_terms( array(
	    	'taxonomy' => 'product_cat',
	    	'hide_empty' => false,
		));
		?>
		<div class="acd_classes_cat acd_shop_mg">
			<ul class="acd_classes_cat_list">
					<li<?php if($id_shop == NULL) { echo ' class="active "'; }?>><a href="<?php echo get_permalink( wc_get_page_id('shop') ) ?>" title="<?php echo esc_html__('All','danlet') ?>"><?php echo esc_html__('All','danlet') ?><span>[<?php echo wp_count_posts('product')->publish; ?>]</span></a></li>
			<?php foreach ($category as $s => $x) : ?>
			<li<?php if($id_shop == $x->term_id) { echo ' class="active "'; }?>><a data-termid="<?php echo esc_attr($x->term_id)?>" href="<?php echo get_term_link($x->term_id,'product_cat'); ?>" title="<?php echo esc_attr($x->name)?>"><?php echo esc_attr($x->name)?><span>[<?php echo esc_attr($x->count) ?>]</span></a></li>
			<?php endforeach; ?>
			</ul>
		</div>
		<?php
	}
}
/**
 * [danlet_remove_woocommerce_product_sorting description]
 * @param  [type] $orderby [description]
 * @return [type]          [description]
 */
if(!function_exists('danlet_remove_woocommerce_product_sorting')) {
	function danlet_remove_woocommerce_product_sorting( $orderby ) {
	  unset($orderby["rating"]);
	  unset($orderby["date"]);
	  unset($orderby["popularity"]);
	  unset($orderby["price"]);
	  unset($orderby["price-desc"]);
	  unset($orderby["menu_order"]);
	  return $orderby;
	}
}
add_filter( "woocommerce_catalog_orderby", "danlet_remove_woocommerce_product_sorting", 20 );
add_filter( 'woocommerce_get_catalog_ordering_args', 'danlet_woocommerce_get_catalog_ordering_args' );
if(!function_exists('danlet_woocommerce_get_catalog_ordering_args')) {
	function danlet_woocommerce_get_catalog_ordering_args( $args ) {
	  $orderby_value = isset( $_GET['orderby'] ) ? woocommerce_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );

		if ( 'low-to-hight' == $orderby_value ) {
			$args['orderby'] = '';
			$args['order'] = 'ASC';
			$args['meta_key'] = '_price';
		}
		if ( 'hight-to-low' == $orderby_value ) {
			$args['orderby'] = '';
			$args['order'] = 'DESC';
			$args['meta_key'] = '_price';
		}
		if ( 'newwest' == $orderby_value ) {
			$args['orderby'] = 'ID';
			$args['order'] = 'DESC';
			$args['meta_key'] = '';
		}
		if ( 'a-z' == $orderby_value ) {
			$args['orderby'] = 'name';
			$args['order'] = '';
			$args['meta_key'] = '';
		}
		return $args;
	}
}
add_filter( 'woocommerce_default_catalog_orderby_options', 'danlet_woocommerce_catalog_orderby' );
add_filter( 'woocommerce_catalog_orderby', 'danlet_woocommerce_catalog_orderby' );
if(!function_exists('danlet_woocommerce_catalog_orderby')) {
	function danlet_woocommerce_catalog_orderby( $sortby ) {
		$sortby['newwest']		=	esc_html__('Newwest','danlet');
		$sortby['a-z']		 	= 	esc_html__('A-Z','danlet');
		$sortby['low-to-hight'] = 	esc_html__('Low to high','danlet');
		$sortby['hight-to-low'] = 	esc_html__('Hight to low','danlet');
		return $sortby;
	}
}

if(!function_exists('danlet_woocommerce_detail_subscriber')) {
	function danlet_woocommerce_detail_subscriber(){ ?>
		<?php
			$enable_subscribe = danlet_check_option_theme('enable-product-subscriber');
		?>
		<?php if($enable_subscribe) : ?>
		<!-- Section Search -->
		   <div class="sh_search svg_relative">
		       <div class="container">
		           <div class="row">
		               <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
		                   <h3 class="sh_search_title sh_search_title_el">
		                      <?php esc_html_e('Join the Vip list' , 'danlet') ?>
		                   </h3>
		                   <div class="sh_search_box sh_search_box_bg_bl">
		                       <form method="get" id="beau-subcribe">
		                           <input type="text" name="email" class="bt-text" id="email"
		                           placeholder="<?php esc_html_e('Enter your email...', 'danlet') ?>">
		                           <button type="submit" name="book-btn-subcribe" class="bt-submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
		                       </form>
		                   </div>
		                   <div class="subcribe-message-title">
		                       <span class="subcribe-title"></span>
		                       <span class="subcribe-message"></span>
		                   </div><!--Subcribe message-->
		               </div>
		           </div>
		       </div>
		   </div>
		   <!-- End section Search -->
	   <?php endif; ?>
	<?php }
}
