<?php
/**
 * @package WordPress
 * @subpackage imminimal
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php get_template_part( 'loop', 'index' ); ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>