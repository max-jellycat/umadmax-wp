<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package U_Mad_Max_?
 */

get_header(); ?>

	<div class="container">
		<div class="row" id="primary">

			<main class="col-sm-8" id="content">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-single', get_post_format() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #content -->

	<aside class="col-sm-4">
		<?php get_sidebar(); ?>
	</aside>

	</div><!-- #primary -->
</div><!-- #container -->

<?php
get_footer();
