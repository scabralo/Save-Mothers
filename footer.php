<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Save_Mothers
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="upper-footer">
			<?php 
				if ( is_active_sidebar( 'footer-1' ) ) dynamic_sidebar('footer-1');
				if ( is_active_sidebar( 'footer-2' ) ) dynamic_sidebar('footer-2');
				if ( is_active_sidebar( 'footer-3' ) ) dynamic_sidebar('footer-3');
			?>
		</div>
		<div class="lower-footer">
			<div class="site-info">
				<div class="social-media-icons">
					<ul>
						<li><a href="https://www.facebook.com/savemothersorg" target="_blank"><img src="https://orpical.com/test/savemothers/wp-content/uploads/2019/10/fb-icon.png" alt="Facebook" srcset=""></a></li>
						<li><a href="#"><img src="https://orpical.com/test/savemothers/wp-content/uploads/2019/10/twitter-icon.png" alt="Twitter" srcset=""></a></li>
					</ul>
				</div>
				<div class="footer-nav-wrapper">
					<nav id="site-navigation" class="main-navigation">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-3',
							'menu_id'        => 'footer-menu',
						) );
						?>
					</nav><!-- #site-navigation -->
				</div>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
