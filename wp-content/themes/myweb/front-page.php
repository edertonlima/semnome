<?php get_header(); ?>

<!-- slide -->
<section class="box-content box-slide no-height">
	<div class="slide">
		<div class="carousel slide" data-ride="carousel" data-interval="6000" id="slide">

			<div class="carousel-inner" role="listbox">

				<?php if( have_rows('slide') ):
					$slide = 0;
					while ( have_rows('slide') ) : the_row();
						$slide = $slide+1;

						if(get_sub_field('video')){ ?>

							<div class="item video <?php if($slide == 1){ echo 'active'; } ?>">
								<video autoplay="true" loop="true" muted="true">
									<source src="<?php echo get_template_directory_uri(); ?>/assets/images/video2.mp4<?php //the_sub_field('video'); ?>" type="video/mp4">
								</video>
								<div class="mask-slide">
									<div class="box-slide-txt" style="display: none;">
										<span class="titulo">
											Arrependei-vos porque é chegado o reino dos céus
											<span>Mateus 4:17</span>
										</span>
									</div>
								</div>
							</div>

						<?php }else{

							if(get_sub_field('imagem')){ ?>

								<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem'); ?>');">

									<div class="box-height">
										<div class="box-texto">
											
											<p class="texto"><?php the_sub_field('texto'); ?></p>
											<?php if(get_sub_field('sub_texto')){ ?>
												<p class="sub-texto"><?php the_sub_field('sub_texto'); ?></p>
											<?php } ?>

										</div>
									</div>
									
								</div>

							<?php }

						}
					endwhile;
				endif; ?>

			</div>

			<ol class="carousel-indicators">
				
				<?php for($i=0; $i<$slide; $i++){ ?>
					<li data-target="#slide" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
				<?php } ?>
				
			</ol>

		</div>
	</div>
</section>

<section class="box-content box-mensagem no-height">
	<div class="container">
		
		<div class="row list-projeto">
			<div class="col-12">

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>