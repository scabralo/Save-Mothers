<?php
/**
 * Template Name: Homepage
 *
 *
 * @package Save_Mothers
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<article class="page type-page status-publish hentry">
				<div class="entry-content">
					<?php
						echo do_shortcode( '[main-hero]' );
						echo do_shortcode( '[after-hero]' );
						echo do_shortcode( '[content-sections]' );
						echo do_shortcode( '[bottom-content-sections]' );
					?>
				</div>
			</article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
