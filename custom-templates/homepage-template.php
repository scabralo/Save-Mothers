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
            echo do_shortcode( '[soliloquy id="369"]' );
            echo do_shortcode( '[after-hero]' );
            echo do_shortcode( '[fullwidth-section]' );
            echo do_shortcode( '[secondary-content]' );

            $resourcesHeader = get_cfc_field( 'homepage-content-sections','content-section-header');
            echo do_shortcode( '[content-sections filter="resources" title="'. $resourcesHeader .'"]' );

            echo do_shortcode( '[experiences-section]' );

            $newsHeader = get_cfc_field('news-events', 'news-events-title');
            echo do_shortcode( '[content-sections filter="news-events" title="'. $newsHeader .'"]' );
					?>
				</div>
			</article>
		</main><!-- #main -->
  </div><!-- #primary -->
  <script>
    (($) => {
      const customLink = $('.after-hero-slideshow .custom-link')
      const slider = $('.after-hero-slideshow .metaslider')
      slider.prepend(customLink)
    })(jQuery)
  </script>
<?php
get_footer();
