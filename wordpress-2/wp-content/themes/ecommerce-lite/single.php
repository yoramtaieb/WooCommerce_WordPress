<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package eCommerce_lite
 */

get_header();

ecommerce_lite_breadcrumb();

?>
<section class="blog single-post">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="row">  
					<div class="col-md-12">
						<?php
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content-single', get_post_type() );
			
								the_post_navigation();

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
						?>
					</div>
				</div>
			</div><!-- # Main-->
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>
		</div><!-- # End row -->
	</div><!-- # Container -->
</section><!-- # End Section -->

<?php
get_footer();
