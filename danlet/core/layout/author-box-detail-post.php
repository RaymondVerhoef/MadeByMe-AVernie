<?php
$author_name = get_the_author();
$author_bio = get_the_author_meta('description');
$author_website = get_the_author_meta('url');
?>
<?php if(!empty($author_name)) : ?>
    <div class="citysoul-author-box container">
        <div class="author-image">
            <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
        </div>
        <div class="author-infomation">
            <div class="author-short-desc  text-more text-white">
                <?php echo esc_attr($author_name) ?>
            </div>
            <?php if ($author_bio != NULL): ?>
            	<div class="author-short-desc text-more text-white">
    	        	<?php echo esc_attr($author_bio) ?>
    	        </div>
            <?php endif ?>

            <?php if ($author_website != NULL): ?>
    	        <div class="author-url text-desc">
    	        	<a href="<?php echo esc_url($author_website) ?>" target="_blank" >
    	        		<?php echo esc_url($author_website) ?>
    	        	</a>
    	        </div>
            <?php endif ?>
        </div><!--End .aurhor-infomation-->
    </div><!--End .box-author -->
<?php endif; ?>
