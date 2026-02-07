<?php

/**
 * Rustikal functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Rustikal
 */

if (! defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rustikal_setup()
{
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on Rustikal, use a find and replace
        * to change 'rustikal' to the name of your theme in all the template files.
        */
    load_theme_textdomain('rustikal', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support('title-tag');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'rustikal'),
        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
            'search-form',
        )
    );
}
add_action('after_setup_theme', 'rustikal_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rustikal_content_width()
{
    $GLOBALS['content_width'] = apply_filters('rustikal_content_width', 640);
}
add_action('after_setup_theme', 'rustikal_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
function rustikal_scripts()
{
    wp_enqueue_style('rustikal-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('rustikal-style', 'rtl', 'replace');
    $dev_server = rustikal_get_vite_dev_server();

    if ($dev_server && rustikal_vite_dev_server_is_up($dev_server)) {
        wp_enqueue_script('vite-client', $dev_server . '/@vite/client', array(), null, true);
        wp_enqueue_script('vite-entry', $dev_server . '/assets/ts/index.ts', array(), null, true);
        return;
    }

    $manifest = rustikal_get_vite_manifest();
    $entry = 'assets/ts/index.ts';

    if (! isset($manifest[$entry])) {
        $fallback_dir = get_template_directory() . '/dist/assets';
        if (! is_dir($fallback_dir)) {
            return;
        }

        $fallback_css = glob($fallback_dir . '/*.css');
        if (! empty($fallback_css)) {
            $css_file = basename($fallback_css[0]);
            wp_enqueue_style(
                'main-stylesheet-fallback',
                get_template_directory_uri() . '/dist/assets/' . $css_file,
                array(),
                _S_VERSION
            );
        }

        $fallback_js = glob($fallback_dir . '/*.js');
        if (! empty($fallback_js)) {
            $js_file = basename($fallback_js[0]);
            wp_enqueue_script(
                'main-javascript',
                get_template_directory_uri() . '/dist/assets/' . $js_file,
                array(),
                _S_VERSION,
                true
            );
        }

        return;
    }

    $entry_file = $manifest[$entry]['file'] ?? '';
    if ($entry_file) {
        wp_enqueue_script(
            'main-javascript',
            get_template_directory_uri() . '/dist/' . $entry_file,
            array(),
            _S_VERSION,
            true
        );
    }

    $entry_css = $manifest[$entry]['css'] ?? array();
    foreach ($entry_css as $index => $css_file) {
        wp_enqueue_style(
            'main-stylesheet-' . $index,
            get_template_directory_uri() . '/dist/' . $css_file,
            array(),
            _S_VERSION
        );
    }
}
add_action('wp_enqueue_scripts', 'rustikal_scripts');

function rustikal_mark_vite_modules($tag, $handle, $src)
{
    $module_handles = array('vite-client', 'vite-entry', 'main-javascript');
    if (in_array($handle, $module_handles, true)) {
        return '<script type="module" src="' . esc_url($src) . '"></script>';
    }

    return $tag;
}
add_filter('script_loader_tag', 'rustikal_mark_vite_modules', 10, 3);

function rustikal_get_vite_dev_server()
{
    $path = get_template_directory() . '/.vite/dev-server';
    if (file_exists($path)) {
        $url = trim((string) file_get_contents($path));
        if ($url !== '') {
            return rtrim($url, '/');
        }
    }

    $env = getenv('VITE_DEV_SERVER');
    if (! $env) {
        return '';
    }

    return rtrim($env, '/');
}

function rustikal_get_vite_manifest()
{
    $paths = array(
        get_template_directory() . '/dist/manifest.json',
        get_template_directory() . '/dist/.vite/manifest.json',
    );

    foreach ($paths as $path) {
        if (! file_exists($path)) {
            continue;
        }

        $contents = file_get_contents($path);
        $manifest = json_decode((string) $contents, true);
        if (is_array($manifest)) {
            return $manifest;
        }
    }

    return array();
}

function rustikal_vite_dev_server_is_up($url)
{
    $parts = wp_parse_url($url);
    if (! $parts || empty($parts['host'])) {
        return false;
    }

    $host = $parts['host'];
    $port = isset($parts['port']) ? (int) $parts['port'] : 80;
    $timeout = 0.2;

    $connection = @fsockopen($host, $port, $errno, $errstr, $timeout);
    if (! $connection) {
        return false;
    }

    fclose($connection);
    return true;
}
