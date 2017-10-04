<div class="page-content-none">
    <div class="container">
        <div class="search-error">
            <h1 class="title-content-none">
             <?php esc_html_e('Nothing Found','danlet'); ?>
            </h1>
        </div>
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
            <p><?php printf( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'danlet' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
        <?php elseif ( is_search() ) : ?>
            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'danlet' ); ?></p>
        <?php else : ?>
            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'danlet' ); ?></p>
        <?php endif; ?>
        <?php get_search_form(); ?>
    </div>
</div><!-- .page-content -->