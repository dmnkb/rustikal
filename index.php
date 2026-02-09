<?php
/**
 * Template fallback.
 * Used when no more specific template matches (incl. blog index if no home.php).
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
        if (have_posts()) :

            /* Start the Loop */
            while (have_posts()) :
                the_post();
                ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="container mx-auto">
						<?php
                        the_title(
                            sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
                            '</a></h2>'
                        );
                ?>
					</div>
					<div class="container mx-auto">
						<?php the_excerpt(); ?>
					</div>
				</article>
				<?php

            endwhile;

            the_posts_navigation();
        else :
            ?>
			<section class="no-results not-found">
				<div class="container mx-auto">
					<h1><?php esc_html_e('Nothing Found', 'rustikal'); ?></h1>
					<?php get_search_form(); ?>
				</div>
			</section>
			<?php

        endif;
?>

	</main><!-- #main -->

<?php
get_footer();
