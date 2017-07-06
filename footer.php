<!--Footer-->
		<footer id="myfooter">
			<div class="container text-center">
				<div class="site-sns">
                <?php 
				
				for($i=0;$i<9; $i++){
					$social_icon = esc_attr(meris_options_array('social_icon_'.$i));
					$social_link = esc_url(meris_options_array('social_link_'.$i));
					if($social_link !=""){
					echo '<a href="'.$social_link.'" target="_blank"><i class="'.$social_icon.'"></i></a>';
					}
					}
					?>
					
				</div>
				<div class="site-info">

						<a href="<?php site_url()?>"><p style="margin-bottom:-15px;"></strong>Política de Privacidad - Términos legales </strong></p></a>
					     <hr class="style-four"/>
					    <p>Copyright© 2016 - ARTE SANTIAGO</p>
				</div>
			</div>
		</footer>
	</div>	
    <?php wp_footer();?>
</body>
</html>