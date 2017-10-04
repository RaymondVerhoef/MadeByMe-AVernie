<?php
if ( post_password_required() ) {
    return;
}
$commenter = wp_get_current_commenter();


$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

if (!class_exists('danlet_walker_comment')) {
    class danlet_walker_comment extends Walker_Comment {

        // init classwide variables
        var $tree_type = 'comment';
        var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );
        function __construct() { ?>
        <div class="comment main-comment danlet-comment-list">

        <?php }

        function start_lvl( &$output, $depth = 0, $args = array() ) {
            $GLOBALS['comment_depth'] = $depth + 1; ?>
            <ul class="children">
        <?php }

        /** END_LVL
         * Ends the children list of after the elements are added. */
        function end_lvl( &$output, $depth = 0, $args = array() ) {
            $GLOBALS['comment_depth'] = $depth + 1; ?>
            </ul>
        <?php }

        /** START_EL */
        function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0) {
            $depth++;
            $add_below ="";
            $GLOBALS['comment_depth'] = $depth;
            $GLOBALS['comment'] = $comment;
            $parent_class = ( empty( $args['has_children'] ) ? 'main-comment' : '' );
            $current_user = wp_get_current_user();
            $reply_args = array(
                'add_below' => 'comment-content',
                'depth' => $depth,
                'max_depth' => $args['max_depth'] );
        ?>

        <ul class="acd_comment_customer">
            <li class="comment main-comment">
            <?php if(get_avatar($comment) != false) :?>
                <div class="acd_comment_cus_img">
                    <?php echo get_avatar( $comment, 100 ); ?>
                </div>
            <?php endif;?>
                <div class="acd_comment_customer_content">
                     <div class="title-comment">
                        <span class="comment-name text-title"><?php comment_author(); ?></span> /
                        <span class="comment-posted-in text-more"><?php comment_date(); ?>, <?php comment_time(); ?>  &nbsp; <?php comment_reply_link( array_merge( $args, $reply_args ) );  ?></span>

                        <span class="comment-message comment" id="comment-content-<?php esc_attr(comment_ID()); ?>">
                            <?php if( !$comment->comment_approved ) : ?>
                            <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.','danlet')?></em>
                            <?php else: ?>
                            <div class="comment-body-content content"><?php comment_text();?></div><!--End comment-body-->
                            <?php endif; ?>
                        </span>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </li>
        </ul>
        <?php }

        function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>
        <?php }

        /** DESTRUCTOR
         * I just using this since we needed to use the constructor to reach the top
         * of the comments list, just seems to balance out :) */
        function __destruct() { ?>

        </div><!-- /#comment-list -->

        <?php }
    }
}
?>
<?php if ( have_comments() ) : ?>
    <div class="comment-list comments-area no-border acd-comment-list">
        <div class="text-title danlet-title text-active text-2x title-comment-box">
            <span><?php esc_html_e(" Comment" ,'danlet'); ?> (<?php echo get_comments_number();?>)</span>
        </div>
        <?php wp_list_comments( array(
            'walker'        => new danlet_walker_comment,
            'callback'      => null,
            'end-callback'  => null,
            'type'          => 'all',
            'page'          => null,
            'avatar_size'   => 50
        ) ); ?>
    </div><!--End comment-list-->
<?php endif; // have_comments() ?>

<div class="clearfix"></div>
<div class="danlet-comment-form content-details">
    <ul class="list-input">
    <?php
    comment_form(
        array(
            'label_submit'  =>esc_html__('Submit comment','danlet'),
            'title_reply'   =>esc_html__('Leave a reply','danlet'),
            'comment_notes_before' =>'<li class="comment-fields text-more text-16x col-md-12 col-xs-12">',
            'fields' => array(
                'author' => '
                <li class="email-fields text-more text-16x col-md-6 col-xs-12">
                    <input id="email-c" placeholder="'.esc_html__('Email *','danlet').'" class="required  txt-form" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' />
                </li>',
                'email' => '
               <li class="author-fields text-more text-16x col-md-6 col-xs-12">
                <input id="author" placeholder="'.esc_html__('Name *','danlet').'" class="required txt-form" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' />
                </li>',
            ),
            'comment_field' => '<textarea id="comment" name="comment" cols="45" rows="2" aria-required="true" placeholder="'.esc_html__('Your comment.','danlet').'" class="required txt-form">' . '</textarea>',
            'comment_notes_after' => '</li>'
        )
    );
    ?>
    </ul>
    <?php
    paginate_comments_links();
    previous_comments_link();
    ?>
    <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
</div>
