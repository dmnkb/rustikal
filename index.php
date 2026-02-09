<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rustikal
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
