<?php
/**
 * Default page template.
 * Used for Pages without a more specific template (e.g., page-{slug}.php).
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
        ?>
				</div>
			</section>
		</main>
		<?php

    endwhile;
?>

<?php
get_footer();
