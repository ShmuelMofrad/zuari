<?php
/**
 * Template part for displaying image posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package zuari
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
	<div class="content__meta">
		<?php
		zuari_posted_on();
		zuari_entry_footer();
		?>
	</div><!-- .entry-meta -->

	<div class="entry">
		<?php zuari_post_thumbnail(); ?>

		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="content__title">', '</h1>' );
			else :
				the_title( '<h2 class="content__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'zuari' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zuari' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
	</div><!-- .entry -->
</article><!-- #post-<?php the_ID(); ?> -->
