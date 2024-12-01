<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package phel-wp-theme
 */

use Phel\Phel;

$projectRootDir = __DIR__ . '/';
require $projectRootDir . 'vendor/autoload.php';


get_header();


if (is_single()) {
    // Single post logic
	// http://localhost:8082/2024/11/30/hello-world/
	echo "its single";

    // You can include a separate file or write the logic here
} elseif (is_archive()) {
    // Archive page logic
	echo "its arch";
} elseif (is_page()) {
    // Page logic
	echo "its page";
} elseif (is_home() || is_front_page()) {
    // Home or front page logic
	// echo "its index";
	Phel::run($projectRootDir, 'phel-wp-theme\index');

} else {
    // Default or 404 logic
	echo "its 404";
}

get_footer();
