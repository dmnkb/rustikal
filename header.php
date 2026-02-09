<?php
/**
 * Site header partial.
 * Loaded by get_header(); includes <head> and opens the page shell.
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<?php
$current_page_id   = get_the_ID();
$current_page_slug = get_post_field('post_name', $current_page_id);
?>

<body class="<?php echo implode(' ', get_body_class()) . ' ' . $current_page_slug . ' page-transition page-exit'; ?>">
<?php wp_body_open(); ?>
<div id="page-transition"></div>
<div id="page" >
		<header class="absolute top-0 left-0 w-full z-10">
			<div class="container mx-auto flex items-center justify-between gap-6 py-6">
				<a href="<?php echo esc_url(home_url('/')); ?>" class="text-lg uppercase tracking-[0.2em] text-slate-200 no-underline transition hover:text-white" rel="home" data-fade-in data-fade-delay="0"><?php bloginfo('name'); ?></a>
                <nav class="primary-nav">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                            'menu_class'     => 'primary-menu',
                            'container'      => false,
                            'items_wrap'     => '<ul id="%1$s" class="%2$s m-0 flex list-none gap-6 p-0 text-sm uppercase tracking-[0.2em] text-slate-200">%3$s</ul>',
                            'walker'         => new Rustikal_Primary_Nav_Walker(),
                        )
                    );
?>
			</nav>
		</div>
	</header>
