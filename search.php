<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Rustikal
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if (have_posts()) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
                    /* translators: %s: search query. */
                    printf(esc_html__('Search Results for: %s', 'rustikal'), '<span>' . get_search_query() . '</span>');
		    ?>
				</h1>
			</header><!-- .page-header -->

			<?php
		    /* Start the Loop */
		    while (have_posts()) :
		        the_post();
		        ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
					</header>

					<div class="entry-summary">
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
					<p><?php esc_html_e('Sorry, no results matched your search.', 'rustikal'); ?></p>
					<?php get_search_form(); ?>
				</div>
			</section>
			<?php

		endif;
?>

	</main><!-- #main -->

<?php
get_footer();
