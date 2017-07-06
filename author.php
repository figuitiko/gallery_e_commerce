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
							<hr class="style-three">
							<?php
							//var_dump($author_id);

							$user = new WP_User( $author_name );
							//var_dump($user->ID);exit;

										?>


										<div class="col-xs-6">
											<div class="col-xs-6">
												<div class="col-xs-12">
													<img class="img-circle img-responsive img-left" alt=""
														 src="<?php echo get_the_author_meta("cupp_upload_meta", $user->ID) ?>">
												</div>
											</div>
											<div class="col-xs-6">
												<div class="col-xs-12">
													<p style="text-align: left"><em class="entry-cursivo">Nombre:&nbsp;<?php the_author_meta("first_name",$user->ID)?>&nbsp;&nbsp;<?php the_author_meta("last_name",$user->ID)?></em></p>

													<p class="entry-my-tax">Correo:&nbsp;<a
																href="mailto:<?php the_author_meta("email",$user->ID) ?>"><?php the_author_meta("email",$user->ID) ?></a>
													</p>

													<p class="entry-my-tax">Tipo de
														Artista:&nbsp;<?php the_author_meta("tipo_artista",$user->ID) ?></p>
												</div>
											</div>
										</div>

										<div class="col-xs-6">
											<div class="entry-main">

												<div id="content" class="entry-content">
													<?php the_author_meta("description",$user->ID) ?>

												</div>

											</div>
										</div>

							<?php

							$author_name;
							$dategroup= '';
							//$author_name=the_author_meta('id');
							//var_dump($author_name);


							$expos_posts= get_posts('post_type=expos&author_name='.$author_name.'&post_status=publish&posts_per_page=-1');?>

							<?php if($expos_posts): ?>
								<div class="blog-list-wrap">
									<?php foreach($expos_posts as $post ):setup_postdata($post);
										$postyear=get_the_time('Y');
										if($postyear != $dategroup){

											echo "<div class='clearfix'></div><hr class=\"style-three\">

											<h1 class='text-left' >Exposiciones&nbsp;&nbsp;".$postyear."</h1>";
											$dategroup=$postyear;
										}
										get_template_part("content","expos");
										?>


									<?php endforeach ?>
								</div>
							<?php endif; ?>
							<?php wp_reset_postdata()?>






                            		<div class="list-pagition text-center">
							<?php if(function_exists("meris_native_pagenavi")){meris_native_pagenavi("echo",$wp_query);}?>
							</div>
							<div class="col-xs-12">
							<hr class="style-three">
								</div>
						</section>
					</div>

				</div>
			</div>	
		</div>
<?php get_footer(); ?>