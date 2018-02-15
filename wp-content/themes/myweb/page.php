<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<section class="box-content no-padding img-destaque header-page" style="background-image: url('<?php the_field('imagem_block') ?>');">
			<div class="mask"><div class="container"><div><span><?php the_title(); ?></span></div></div></div>
		</section>

		<section class="box-content no-height verde">
			<div class="container">
				
				<div class="content-post">

					<div class="row">

						<?php if(!is_page('oferte')){ ?>
							<div class="col-4">
								<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' ); ?>
								<img src="<?php echo $imagem[0]; ?>" class="img-ico-cont">
							</div>
						<?php } ?>

						<div class="<?php if(is_page('oferte')){ echo 'col-12'; }else{ echo 'col-8'; } ?>">
							<h2 class=""><?php the_title(); ?></h2>
							<h4 class=""><?php the_field('subtitulo'); ?></h4>
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>

			</div>
		</section>

		<?php if(is_page('oferte')){ ?>
			<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' ); ?>
			<section class="box-content no-padding sobre no-height envolvase envolvase-home" style="background-image: url('<?php echo $imagem[0]; ?>');">
				<div class="mask">	

					<div class="container">
						
						<div class="row">
							<div class="col-12">
								<h2 class="center">Oferte</h2>
								<h4 class="center">Seja a diferença! Faça a sua doação</h4>

								<ul class="doacao">
									<li class="">
										<div class="cont">
											<div class="middle">
												<h2>quero doar</h2>
												<span>R$ 10</span>
											</div>
										</div>
									</li>
									<li class="active">
										<div class="cont">
											<div class="middle">
												<h2>quero doar</h2>
												<span>R$ 50</span>
											</div>
										</div>
									</li>
									<li class="">
										<div class="cont">
											<div class="middle">
												<h2>quero doar</h2>
												<span>R$ 100</span>
											</div>
										</div>
									</li>
									<li class="outro_valor">
										<div class="cont">
											<div class="middle">
												<h2>outra quantia</h2>
												<span><input type="text" class="real" id="outro_valor" name="outro_valor" placeholder="R$ 0"></span>
											</div>
										</div>
									</li>
									<li class="button-ofertar">
										<a href="javascript:" class="button enviar ofertar">Ofertar!</a>
									</li>
								</ul>

								<p class="center">
									<a href="javascript:" class="button enviar">Desejo ser um parceiro mensal</a>
									<span class="info-p">* Escolha uma quantia</span>
								</p>
							</div>
						</div>
					</div>

				</div>
			</section>
		<?php } ?>

		<section class="box-content no-height amarelo">
			<div class="container">
				
				<div class="content-post">
					<div class="row">
						<div class="col-12 justify">
							<?php the_content(); ?>
						</div>
					</div>
				</div>

			</div>
		</section>

		<?php //if(is_page('sobre')){
			if(have_rows('item_sobre')): ?>

				<section class="box-content no-height">
					<div class="container">
						
						<div class="content-post">
							<div class="row">

								<?php while ( have_rows('item_sobre') ) : the_row(); ?>

									<?php $imagem = get_sub_field('imagem'); ?>

									<div class="sobre-home row" id="<?php the_sub_field('titulo'); ?>">
										<div class="col-4">
											<img src="<?php echo $imagem['sizes']['thumbnail']; ?>">
										</div>
										
										<div class="col-8 txt-sobre">
											<h2><?php the_sub_field('titulo'); ?></h2>
											<h4><?php the_sub_field('subtitulo'); ?></h4>
											<p><?php the_sub_field('texto'); ?></p>
										</div>
									</div>

								<?php endwhile; ?>

							</div>
						</div>

					</div>
				</section>

			<?php endif;
		//} ?>

		<script type="text/javascript">
			jQuery(window).load(function(){

			});
		</script>

	<?php endwhile;	?>

<?php get_footer(); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/maskedinput.js"></script>
<script type="text/javascript">

	jQuery(document).ready(function(){
		jQuery('.doacao li').click(function(){
			jQuery('.doacao li').removeClass('active');
			jQuery(this).addClass('active');

			if(jQuery(this).hasClass('outro_valor')){
				jQuery('#outro_valor').focus();
			}
		});
	});

	jQuery(function($){
	   jQuery.mask.definitions['d'] = '[0-9.]';
	   jQuery('.real').mask('R$ 9?ddddd', ' ');
	});
</script>