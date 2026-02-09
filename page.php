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
		<main id="post-<?php the_ID(); ?>" <?php post_class('bg-[#0c1222] text-slate-100'); ?>>
			<section class="py-16 md:py-24">
				<div class="container mx-auto px-6">
					<div class="mx-auto">
						<h1 class="text-4xl md:text-5xl font-bold tracking-tight text-slate-50"><?php the_title(); ?></h1>
						<div class="mt-8 space-y-6 text-base sm:text-lg leading-relaxed text-slate-300">
							<?php
                            the_content();
        ?>
						</div>
					</div>
				</div>
			</section>
		</main>
		<?php

    endwhile;
?>

<?php
get_footer();
