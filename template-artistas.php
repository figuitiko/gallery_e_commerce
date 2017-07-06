<?php
/*
Template Name: artistas Template
*/
get_header(); ?>
    <div class="blog-list">
        <div class="caja">
            <div class="row">
                <div class="col-md-12">
                    <section class="blog-main text-center" role="main">
                        <div class="breadcrumb-box text-left">
                            <?php meris_get_breadcrumb();?>
                        </div>
                        <div class="col-xs-12">
                            <hr class="style-three">
                        </div>
                        <?php
                        $args=array('role'=>'author');
                        $authors=get_users($args);
                       // var_dump($authors);
                        if ( is_array( $authors ) ) {
                            foreach ( $authors as $author ) {
                                ?>
                                <div class="col-xs-4">
                                    <div class="hovereffect">
                                        <img class="img-circle img-responsive img-left" src="<?php echo get_the_author_meta("cupp_upload_meta",$author->ID) ?>" alt="">
                                        <div class="overlay">
                                            <h2><?php the_author_meta("first_name",$author->ID)?>&nbsp;&nbsp;<?php the_author_meta("last_name",$author->ID)?></h2>
                                            <a class="info" href="<?php  echo get_author_posts_url($author->ID)?>">Leer más</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xs-8">
                                  <div class="col-xs-12">
                                      <p style="text-align: left"><em class="entry-cursivo">Nombre:&nbsp;<?php the_author_meta("first_name",$author->ID)?>&nbsp;&nbsp;<?php the_author_meta("last_name",$author->ID)?></em></p>
                                      <p class="entry-my-tax">Correo:&nbsp;<a href="mailto:<?php the_author_meta("email",$author->ID)?>"><?php the_author_meta("email",$author->ID)?></a></p>
                                      <p class="entry-my-tax">Tipo de Artista:&nbsp;<?php the_author_meta("tipo_artista",$author->ID)?></p>
                                      <p style="text-align: left"><?php the_author_meta("description",$author->ID)?>&nbsp;<a href="<?php echo get_author_posts_url($author->ID);?>">Leer más</a></p>
                                  </div>
                                </div>
                                <div class="col-xs-12">
                                    <hr class="style-three">
                                </div>
                                <?php
                            }
                        }


                        ?>
                        <div class="list-pagition text-center">
                            <?php if(function_exists("meris_native_pagenavi")){meris_native_pagenavi("echo",$wp_query);}?>
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>
<?php get_footer(); ?>