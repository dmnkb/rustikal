<?php
/**
 * Front page template.
 * Used for `/` when a static front page is set in Settings -> Reading.
 */

get_header();
?>

	<?php
    while (have_posts()) :
        the_post();
        ?>
		<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<section>
				<div class="container mx-auto">
					<h1 class="text-2xl mb-3"><?php the_title(); ?></h1>
					<?php
                    the_content();
        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'rustikal'),
                'after'  => '</div>',
            )
        );
        ?>asd
				</div>
			</section>
		</main>
		<?php

    endwhile; // End of the loop.
?>

<?php
get_footer();
