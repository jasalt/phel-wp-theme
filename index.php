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

get_header();

if (is_single()) {
	echo "its single";
    // Single post logic
    // You can include a separate file or write the logic here
} elseif (is_archive()) {
	echo "its arch";
    // Archive page logic
} elseif (is_page()) {
	echo "its page";
    // Page logic
} elseif (is_home() || is_front_page()) {
	echo "its home";
    // Home or front page logic
} else {
	echo "its 404";
    // Default or 404 logic
}

get_footer();
