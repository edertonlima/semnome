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
											
											<p class="texto"><?php the_sub_field('titulo'); ?></p>
											<?php if(get_sub_field('texto')){ ?>
												<p class="sub-texto">
													<?php the_sub_field('texto'); ?>
												</p>
											<?php } ?>
											<p><a href="javascript:" class="button btn-slide">saiba mais</a></p>

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

<?php if(have_rows('item_sobre')): ?>

	<section class="box-content no-height">
		<div class="container">
			
			<div class="row">

				<?php while ( have_rows('item_sobre') ) : the_row();
					$imagem = get_sub_field('imagem'); ?>

					<div class="col-4 item-home-sobre">

						<?php if($imagem){ ?>
							<img src="<?php echo $imagem['sizes']['thumbnail']; ?>">
						<?php }else{ 
							if(get_sub_field('icone')){ ?>
								<i class="fa <?php the_sub_field('icone'); ?>" aria-hidden="true"></i>
							<?php }
						} ?>
						<h3><?php the_sub_field('titulo'); ?></h3>
						<h4><?php the_sub_field('subtitulo'); ?></h4>
						<p><?php the_sub_field('texto'); ?></p>

					</div>

				<?php endwhile; ?>

			</div>
		</div>
	</section>

<?php endif; ?>

<section class="box-content no-height cinza">
	<div class="servicos-home">

		<h2>Serviços</h2>
		
		<ul>
			<?php
				query_posts(
					array(
						'post_type' => 'servicos',
						'posts_per_page' => 5
					)
				);

				while ( have_posts() ) : the_post(); 
					$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>

					<li class="item-home-servico" style="background-image: url('<?php echo $imagem[0]; ?>');">

						<h3><?php the_title(); ?>
							<a href="<?php the_permalink(); ?>" class="button saiba-mais-inline">
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								saiba mais
							</a>
						</h3>

					</li>

				<?php endwhile;
			?>
		</ul>

		<a href="<?php echo get_home_url(); ?>/servicos" class="button saiba-mais-box">
			<i class="fa fa-wrench" aria-hidden="true"></i>
			visualizar mais serviços
		</a>
	</div>
</section>

<?php get_footer(); ?>

<script type="text/javascript">
	jQuery(document).ready(function(){

		jQuery('.item-home-servico').hover(function(){
			jQuery('.item-home-servico').addClass('no-active');
			jQuery(this).addClass('active');
		}, function(){
			jQuery('.item-home-servico').removeClass('active no-active');
		});

	});
</script>