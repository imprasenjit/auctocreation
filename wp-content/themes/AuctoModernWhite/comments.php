<?php

/**
 * Template for displaying comments
 *
 * @package AuctoModernWhite
 * @version 2.0
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>

        <!-- Comments Title -->
        <h4 class="comments-title mb-4">
            <?php
            $comment_count = get_comments_number();
            if ($comment_count === 1) {
                echo '1 Comment';
            } else {
                echo $comment_count . ' Comments';
            }
            ?>
        </h4>

        <!-- Comments List -->
        <ol class="comment-list list-unstyled">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
                'callback' => 'auctocreation_comment_callback'
            ));
            ?>
        </ol>

        <!-- Comments Navigation -->
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="comments-navigation mt-4">
                <div class="nav-links d-flex justify-content-between">
                    <div class="nav-previous">
                        <?php previous_comments_link('<i class="fas fa-chevron-left me-2"></i>Older Comments'); ?>
                    </div>
                    <div class="nav-next">
                        <?php next_comments_link('Newer Comments<i class="fas fa-chevron-right ms-2"></i>'); ?>
                    </div>
                </div>
            </nav>
        <?php endif; ?>

    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments alert alert-info">
            <i class="fas fa-lock me-2"></i>
            Comments are closed.
        </p>
    <?php endif; ?>

    <?php
    // Comment Form
    if (comments_open()) :
        $commenter = wp_get_current_commenter();
        $req = get_option('require_name_email');
        $aria_req = ($req ? " aria-required='true' required" : '');

        $comment_form_args = array(
            'id_form' => 'commentform',
            'class_form' => 'comment-form mt-5',
            'title_reply' => '<h4 class="comment-reply-title mb-4"><i class="fas fa-comment me-2"></i>Leave a Comment</h4>',
            'title_reply_to' => '<h4 class="comment-reply-title mb-4"><i class="fas fa-reply me-2"></i>Reply to %s</h4>',
            'cancel_reply_link' => '<i class="fas fa-times me-1"></i>Cancel Reply',
            'label_submit' => 'Post Comment',
            'class_submit' => 'btn btn-primary',
            'submit_button' => '<button type="submit" id="%2$s" class="%3$s"><i class="fas fa-paper-plane me-2"></i>%4$s</button>',
            'comment_field' => '<div class="mb-3">
                <label for="comment" class="form-label">Comment *</label>
                <textarea id="comment" name="comment" class="form-control" rows="6" placeholder="Write your comment here..." required></textarea>
            </div>',
            'fields' => array(
                'author' => '<div class="row"><div class="col-md-4 mb-3">
                    <label for="author" class="form-label">Name' . ($req ? ' *' : '') . '</label>
                    <input id="author" name="author" type="text" class="form-control" value="' . esc_attr($commenter['comment_author']) . '" placeholder="Your name"' . $aria_req . '>
                </div>',
                'email' => '<div class="col-md-4 mb-3">
                    <label for="email" class="form-label">Email' . ($req ? ' *' : '') . '</label>
                    <input id="email" name="email" type="email" class="form-control" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="your@email.com"' . $aria_req . '>
                </div>',
                'url' => '<div class="col-md-4 mb-3">
                    <label for="url" class="form-label">Website</label>
                    <input id="url" name="url" type="url" class="form-control" value="' . esc_attr($commenter['comment_author_url']) . '" placeholder="https://yourwebsite.com">
                </div></div>',
            ),
            'comment_notes_before' => '<p class="comment-notes text-muted mb-3">
                <i class="fas fa-info-circle me-2"></i>
                Your email address will not be published. Required fields are marked *
            </p>',
            'comment_notes_after' => '',
        );

        comment_form($comment_form_args);
    endif;
    ?>

</div>

<?php
/**
 * Custom comment callback function
 */
if (!function_exists('auctocreation_comment_callback')) :
    function auctocreation_comment_callback($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);

        if ('div' == $args['style']) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
?>

        <<?php echo $tag; ?> <?php comment_class('comment-item mb-4 p-4 bg-light rounded'); ?> id="comment-<?php comment_ID(); ?>">

            <div class="comment-body">
                <div class="comment-meta d-flex align-items-start mb-3">
                    <div class="comment-avatar me-3">
                        <?php echo get_avatar($comment, 60, '', '', array('class' => 'rounded-circle')); ?>
                    </div>

                    <div class="comment-metadata flex-grow-1">
                        <div class="comment-author-info">
                            <h6 class="comment-author mb-1">
                                <?php echo get_comment_author_link(); ?>
                            </h6>
                            <div class="comment-date-time text-muted">
                                <small>
                                    <i class="fas fa-clock me-1"></i>
                                    <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>"
                                        class="text-decoration-none text-muted">
                                        <?php echo get_comment_date('F j, Y \a\t g:i a'); ?>
                                    </a>
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="comment-actions">
                        <?php comment_reply_link(array_merge($args, array(
                            'add_below' => $add_below,
                            'depth' => $depth,
                            'max_depth' => $args['max_depth'],
                            'before' => '<small class="reply-link">',
                            'after' => '</small>'
                        ))); ?>
                    </div>
                </div>

                <div class="comment-content">
                    <?php if ($comment->comment_approved == '0') : ?>
                        <div class="alert alert-warning" role="alert">
                            <i class="fas fa-hourglass-half me-2"></i>
                            Your comment is awaiting moderation.
                        </div>
                    <?php endif; ?>

                    <?php comment_text(); ?>
                </div>
            </div>

            <?php if ('div' != $args['style']) : ?>
                </li>
            <?php endif; ?>

    <?php
    }
endif;
    ?>

    <style>
        .comments-area {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid #e5e7eb;
        }

        .comment-item {
            transition: all 0.3s ease;
        }

        .comment-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .comment-list .children {
            margin-left: 2rem;
            margin-top: 1rem;
        }

        .comment-form .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.25);
        }

        .reply-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.875rem;
        }

        .reply-link a:hover {
            text-decoration: underline;
        }

        .comment-reply-title {
            color: var(--text-primary);
        }

        .comment-notes {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 0.5rem;
            border-left: 4px solid var(--primary-color);
        }

        @media (max-width: 768px) {
            .comment-list .children {
                margin-left: 1rem;
            }

            .comment-meta {
                flex-direction: column;
            }

            .comment-actions {
                margin-top: 0.5rem;
                align-self: flex-start;
            }
        }
    </style>