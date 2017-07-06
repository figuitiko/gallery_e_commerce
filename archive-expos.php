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
								<div class="row">
									<div class="col-xs-12">
                     <?php $dategroup= '';?>
                    <?php while ( have_posts() ) : the_post();
						$postyear=get_the_time('Y');

						 if($postyear != $dategroup){

							 echo "<div class='clearfix'></div><hr class=\"style-three\">";
							 echo "<h3 class='text-left' >".$postyear."</h3>";
							 $dategroup=$postyear;
						 }

					    get_template_part("content","expos");
					?>
                   <?php endwhile;?>
                   </div>
					</div>
				</div>
                   <?php endif;?>
                            		<div class="list-pagition text-center">
							<?php if(function_exists("meris_native_pagenavi")){meris_native_pagenavi("echo",$wp_query);}?>
							</div>
						</section>
					</div>

				</div>
			</div>	
		</div>
<?php get_footer(); ?>