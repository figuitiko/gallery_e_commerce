
								
								<div class="entry-main">

									<div class="entry-summary">
										<?php if ( has_post_thumbnail() ) {?>
										<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">


												<div class="hovereffect">
													<img class="img-responsive" src="<?php the_post_thumbnail_url() ?>" alt="">
													<div class="overlay">
														<h2><?php the_title()?></h2>
														<a class="info" href="<?php the_permalink()?>">Leer más</a>
													</div>
												</div>

										</div>
										<?php

												}
										?>


									</div>

								</div>

