<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rustikal
 */

?>

<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section>
		<div class="container">
			<h1>
				<?php the_title(); ?>
			</h1>
			<?php
			the_content();
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rustikal' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>
	</section>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="container">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'rustikal' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</main><!-- #post-<?php the_ID(); ?> -->
