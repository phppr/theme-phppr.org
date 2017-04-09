<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
	<header class="entry-header article__heading">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title section__title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title article__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta article__meta">
				<?php odin_posted_on(); ?>
			</div>
		<?php endif; ?>
	</header>

	<?php if ( is_search() ) : ?>
		<div class="entry-summary article__content">
			<?php the_excerpt(); ?>
		</div>
	<?php else : ?>
	    <?php if ( is_single() ) : ?>
            <div class="entry-content article__content card">
                <?php
                    the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'odin' ) );
                    wp_link_pages( array(
                        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'odin' ) . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                    ) );
                ?>
            </div><!-- .entry-content -->
	    <?php else: ?>
            <div class="entry-content article__content">
                <?php
                    the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'odin' ) );
                    wp_link_pages( array(
                        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'odin' ) . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                    ) );
                ?>
            </div><!-- .entry-content -->
	    <?php endif; ?>
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?>
			<span class="cat-links"><?php echo __( 'Posted in:', 'odin' ) . ' ' . get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'odin' ) ); ?></span>
		<?php endif; ?>
		<?php the_tags( '<span class="tag-links">' . __( 'Tagged as:', 'odin' ) . ' ', ', ', '</span>' ); ?>
		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'odin' ), __( '1 Comment', 'odin' ), __( '% Comments', 'odin' ) ); ?></span>
		<?php endif; ?>
	</footer>
</article><!-- #post-## -->
