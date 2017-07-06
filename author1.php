<?php
/**
 * The archive template file.
 *
 * @since meris 1.0.0
 */

get_header(); ?>
<div class="blog-list">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<section class="blog-main text-center" role="main">
							<div class="breadcrumb-box text-left">
								<?php meris_get_breadcrumb();?>
							</div>

                            <?php if (have_posts()) :?>
                            <div class="blog-list-wrap">
                    <?php while ( have_posts() ) : the_post();

					    get_template_part("content","article");
					?>
                   <?php endwhile;?>
                   </div>
                   <?php endif;?>

							<?php
							$author_name;

							//$author_name=the_author_meta('id');
							//var_dump($author_name);

							$expos_posts= get_posts('post_type=expos&author_name='.$author_name.'&post_status=publish');?>

                                 <?php if($expos_posts): ?>
		                        <div class="blog-list-wrap">
							<?php foreach($expos_posts as $post ):setup_postdata($post);
							    get_template_part("content","article");?>
			              <?php endforeach ?>
							    </div>
	                           <?php endif; ?>
							<?php wp_reset_postdata()?>
							<div class="list-pagition text-center">
							<?php if(function_exists("meris_native_pagenavi")){meris_native_pagenavi("echo",$wp_query);}?>
							</div>
						</section>
					</div>

				</div>
			</div>	
		</div>
<?php get_footer(); ?>