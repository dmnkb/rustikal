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
            <?php
            $tagline = get_bloginfo('description');
        ?>
            <header class="relative w-full min-h-[80vh] flex items-center overflow-hidden bg-[#0c1222] text-slate-100">
                <div class="pointer-events-none absolute inset-0 opacity-70 [background-image:radial-gradient(circle_at_top,#1b2a4a_0%,transparent_55%),radial-gradient(circle_at_80%_20%,#0f3d3a_0%,transparent_50%)]"></div>
                <div class="container relative mx-auto px-6">
                    <div class="mx-auto text-center">
                        <p class="text-xs font-semibold uppercase tracking-[0.5em] text-slate-300"><?php bloginfo('name'); ?></p>
                        <h1 class="mt-6 text-[6rem] font-bold leading-[0.95] tracking-tight text-slate-50" data-stagger data-stagger-delay="420" data-stagger-speed="65" data-stagger-duration="700">
                            <?php the_title(); ?>
                        </h1>
                        <p class="mt-6 text-base sm:text-lg leading-relaxed text-slate-300" data-stagger data-stagger-delay="700" data-stagger-speed="20" data-stagger-duration="700">Here comes some fancy dummy text. <br />Here's another sentence.</p>
                        <div class="mt-10 flex justify-center gap-4">
                            <a href="#hero-media" class="inline-flex items-center justify-center rounded-full bg-emerald-300 px-6 py-3 text-sm font-semibold uppercase tracking-[0.2em] text-[#0b1b1a] transition hover:bg-emerald-200">Learn more</a>
                        </div>
                    </div>
                </div>
            </header>
            
			<section id="page-content" class="py-12">
				<div class="container mx-auto px-6">
                    <?php the_content(); ?>
				</div>
			</section>
		</main>
		<?php

    endwhile;
?>

<?php
get_footer();
