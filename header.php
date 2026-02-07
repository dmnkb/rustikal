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
	<header class="page-header">
		<div class="container">
			<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
			<nav>
				<?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                    )
                );
?>
			</nav>
		</div>
	</header>
