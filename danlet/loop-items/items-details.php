<div class="content-blog-details">
    <?php
        /**
             * danlet_before_loop_content hook.
             *
             * @hooked danlet_get_thumbnail - 10
             * @hooked danlet_get_sticker - 20
             * @hooked danlet_title_single_content - 30
             * @hooked danlet_info_single_content - 40
             */
            do_action( 'danlet_before_loop_content' );
    ?>
    <?php
        /**
             * danlet_after_loop_content hook.
             *
             * @hooked danlet_before_content_single - 10
             * @hooked danlet_content_single - 20
             * @hooked danlet_tag_share_content_single - 30
             * @hooked danlet_after_content_single - 40
             */
            do_action( 'danlet_after_loop_content' );
    ?>
</div>