<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package U_Mad_Max_?
 */

get_header(); ?>

<?php
if ( have_posts() ) : ?>

<section class="feature-image feature-image-default-alt" data-type="background" data-speed="2"></section>

<div class="container">
	<div id="primary" class="row">

		<h2 class="page-title"><?php printf( esc_html__( 'Résultat pour %s', 'u-mad-max' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

		<main id="content" class="col-sm-8">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

			else :

			get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</main><!-- #main -->

		<aside class="col-sm-4"> <?php get_sidebar(); ?> </aside>

	</div><!-- #primary -->
</div>

<?php

get_footer();
