<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rustikal
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
        ?>
				</div>
			</section>
		</main>
		<?php

    endwhile; // End of the loop.
?>

<?php
get_footer();
