<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package U_Mad_Max_?
 */

?>

	</div><!-- #content -->

	<!-- SIGN UP SECTION
	================================================== -->
	<section id="stream">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<h1>La rage en live !</h1>
					<p >Si ma connexion dissidente le permet, viens me voir rager en live. Et oublie pas d'amener tes copains et copines !</p>
					<p>Tu pourras retrouver du jeu de combat en veux-tu en voilà, du Trackmania et grosso merdo ce dont j'ai envie. D'ailleurs si tu veux participer manifeste-toi fiéffé(e) coquin(e) !</p>
				</div>
				<div class="col-md-6 text-center twitch" col-sm-12>
					<?php echo do_shortcode('[plumwd_twitch_stream channel="Namzar"]'); ?>
				</div><!-- end col -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- signup -->

	<!-- FOOTER
	================================================== -->
	<footer>
		<div class="container">
			<div class="col-sm-2 col-xs-12">
				<p><a href="/"><img src="<?php bloginfo('template_directory'); ?>/img/logo_umad.png" alt="U mad, Max?"></a></p>
			</div><!-- end col -->
			<div class="col-sm-6 col-xs-12">
				<?php
					wp_nav_menu( array(
						'theme_location'		=> 'footer',
						'container'					=> 'nav',
						'menu_class'				=> 'list-unstyled list-inline'
					) );
				?>
			</div><!-- end col -->
			<div class="col-sm-4 col-xs-12">
        <p class="pull-right">&copy; <?php echo date('Y'); ?> - Codé avec <i class="fa fa-heart"></i> par
          <img id="logo-jellycat" src="<?php bloginfo('template_directory'); ?>/img/logo_jellycat.png" alt="">
      </div>
		</div><!-- container -->
	</footer>


	<!-- MODAL
	================================================== -->
	<div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel"><i class="fa fa-envelope"></i> Abonnement à la newsletter</h4>
				</div>
				<div class="modal-body">
					<p>Maintenant que tu as cliqué, utilise ton clavier afin de rentrer tes coordonnées <strike>bancaires</strike>,  <em>en plus c'est gratuit !</em></p>

					<?php echo do_shortcode('[email-subscribers-advanced-form id="1"]') ?>

					<hr>

					<p><small>Je, soussigné l'auteur de ce blog déclare solennellement ne pas fournir les informations ci-dessus à de vils hackeurs russes.</small></p>
				</div><!-- modal-body -->
			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>

<?php wp_footer(); ?>

</body>
</html>
