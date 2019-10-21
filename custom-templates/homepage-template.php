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
            // echo do_shortcode( '[after-content-section]' );
            // echo do_shortcode( '[field-content-section]' );
            echo do_shortcode( '[news-events]' );            
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
