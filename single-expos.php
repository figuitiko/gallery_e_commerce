<?php
/**
 * The Template for displaying single post.
 *
 * @since meris 1.0.0
 */

get_header(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if (have_posts()) :?>
<?php	while ( have_posts() ) : the_post();

?>
<div class="blog-list">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<section class="blog-main text-center" role="main">
							<div class="breadcrumb-box text-left">
								<?php meris_get_breadcrumb();?>
							</div>
							<article class="text-left">

								<div class="col-xs-12"><hr class="style-three"/></div>
								<div class="col-xs-6">
									<div class="col-xs-6">
										<div class="col-xs-12">
									<img class="img-circle img-responsive img-left" alt=""
										 src="<?php echo get_the_author_meta("cupp_upload_meta",$post->post_author)?>">
											</div>
									</div>
									<div class="col-xs-6">
										<div class="col-xs-12">
											<p class="entry-my-tax">Expocisiones de <?php the_terms($post->ID,"tipos")?></p>
												<h1 class="entry-my-title"><?php the_title();?></h1>
											<?php //var_dump(get_the_author_posts_link())?>
											<em class="entry-cursivo">por: <?php the_author_posts_link()?></em>
									</div>
									</div>

								</div>
								<div class="col-xs-6">

								<div class="my-entry-main">

									<div id="content" class="entry-content">
									<?php the_excerpt();  ?>


										<div id="more" class="my-entry-more"><?php _e("Leer Más","meris");?> <i class="fa fa-angle-double-right"></i></div>
									</div>
									<div id="contenth" class="entry-content" hidden>
										<?php the_content(); ?>
										<div id="more1" class="my-entry-more"><i class="fa fa-angle-double-left"></i><?php _e("recoger","meris");?> </div>
									</div>
                                    <?php  wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'meris' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );?>
								</div>
								</div>
								<div class="col-xs-12"><hr class="style-three"/></div>
								<div class="col-xs-12">
									<?php  $custom = get_post_custom($post->ID);
									$galeria=$custom['gallery'][0];
									if($galeria)
									{ echo do_shortcode($galeria); }?>
								</div>
								<div class="col-xs-12"><hr class="style-three"/></div>
							</article>
						</section>
					</div>
				</div>
			</div>	
		</div>
<?php endwhile;?>
<?php endif;?>
</div>
<script>
	jQuery(document).ready(function() {
	jQuery('#more').on('click', function() {

		jQuery('#content').hide();
		jQuery('#contenth').show();
	})
		jQuery('#more1').on('click', function() {

			jQuery('#contenth').hide();
			jQuery('#content').show();


		})
		jQuery('#more1').on('hover', function() {
			jQuery('#more1').css('cursor','zoom-out');
		})
	})
</script>
<?php get_footer(); ?>