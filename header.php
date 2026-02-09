<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rustikal
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

<body class="<?php echo implode(' ', get_body_class()) . ' ' . $current_page_slug; ?>">
<?php wp_body_open(); ?>
<div id="page" >
		<header class="page-header border-b border-neutral-200">
			<div class="container mx-auto flex items-center justify-between gap-6 py-4">
				<a href="<?php echo esc_url(home_url('/')); ?>" class="text-base uppercase tracking-[0.06em] text-current no-underline" rel="home"><?php bloginfo('name'); ?></a>
			<nav class="primary-nav">
				<?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'primary-menu',
                        'container'      => false,
                        'items_wrap'     => '<ul id="%1$s" class="%2$s m-0 flex list-none gap-5 p-0">%3$s</ul>',
                        'walker'         => new Rustikal_Primary_Nav_Walker(),
                    )
                );
?>
			</nav>
		</div>
	</header>
