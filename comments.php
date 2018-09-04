<div class="single-share col-12">
    <ul class="custom-comment-list list-unstyled">
        <?php wp_list_comments( 'type=comment&callback=sombras_custom_comment_list' ); ?>

    </ul>
    <?php paginate_comments_links(); ?>
    <?php $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $required_text = __('Los campos marcados con (*) son requeridos', 'sombras');
    ?>
    <?php $fields =  array(
    'author' =>
    '<p class="comment-form-author"><label for="author">' . __( 'Nombre', 'sombras' ) .
    ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' placeholder="'. __( 'Introduce tu nombre', 'sombras' ) . '" /></p>',

    'email' =>
    '<p class="comment-form-email"><label for="email">' . __( 'Correo', 'sombras' ) .
    ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . '  placeholder="'. __( 'Introduce tu correo', 'sombras' ) . '" /></p>',

    'url' => '',
);
    ?>
    <?php $args = array(
    'id_form'           => 'commentform',
    'class_form'      => 'comment-form',
    'id_submit'         => 'submit',
    'class_submit'      => 'submit',
    'name_submit'       => 'submit',
    'title_reply'       => __( 'Leave a Reply' ),
    'title_reply_to'    => __( 'Leave a Reply to %s' ),
    'cancel_reply_link' => __( 'Cancelar la respuesta', 'sombras' ),
    'label_submit'      => __( 'Post Comment' ),
    'format'            => 'xhtml',

    'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
    '</label><textarea id="comment" name="comment" cols="45" rows="3" aria-required="true">' .
    '</textarea></p>',

    'must_log_in' => '<p class="must-log-in">' .
    sprintf(
        __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
        wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</p>',

    'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
        __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
        admin_url( 'profile.php' ),
        $user_identity,
        wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',

    'comment_notes_before' => '<p class="comment-notes">' .
    __( 'Your email address will not be published.' ) . ( $req ? ' ' . $required_text : '' ) .
    '</p>',

    'comment_notes_after' => '',

    'fields' => apply_filters( 'comment_form_default_fields', $fields ),
); ?>
    <div class="custom-comment-form">
        <?php comment_form($args, get_the_ID()); ?>
    </div>
</div>
