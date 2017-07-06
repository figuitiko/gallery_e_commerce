<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 01/12/2016
 * Time: 0:36
 */
     get_header()?>
<div class="blog-list">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<section class="blog-main text-center" role="main">
							<div class="breadcrumb-box text-left">
								<?php meris_get_breadcrumb();?>


</div>


                            <div class="col-xs-12"><hr class="style-three"></div>
                            <?php woocommerce_content(); ?>

</section>
</div>

</div>
</div>
</div>

<?php get_footer(); ?>