<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package phel-wp-theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php

use Phel\Phel;
$projectRootDir = __DIR__ . '/';
Phel::run($projectRootDir, 'phel-wp-theme\single');

		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
