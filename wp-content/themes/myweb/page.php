<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
		<section class="box-content no-padding header-page" style="background-image: url('<?php echo $imagem[0]; ?>');">
			<div class="mask"><div class="container"><div><span><?php the_title(); ?></span></div></div></div>
		</section>

		<?php if((have_rows('colunas')) or (get_the_content())): ?>

			<section class="box-content no-height amarelo">
				<div class="container">
					
					<div class="content-post">
						<div class="row">
							<div class="col-12 justify-center">
								<h2><?php the_field('subtitulo'); ?></h2>
								<?php the_content(); ?>
							</div>
						</div>

						<?php if(have_rows('colunas')):
							$count_colunas = 12/(count(get_field('colunas'))); ?>
							<div class="row <?php if(get_the_content()){ echo 'margin-top-40'; } ?>">
								<?php while ( have_rows('colunas') ) : the_row(); ?>

									<div class="col-<?php echo $count_colunas; ?>">
										<p class="justify"><?php the_sub_field('texto'); ?></p>
									</div>

								<?php endwhile; ?>
							</div>
						<?php endif; ?>					
					</div>

				</div>
			</section>
		
		<?php endif; ?>	

		<?php if(have_rows('item_sobre')): ?>

			<section class="box-content no-height no-padding-top">
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

		<?php if(is_page('fale-conosco')){ ?>

			<section class="box-content no-height">
				<div class="container">
					<div class="row">

						<div class="col-8">
							<form class="row contato">
								<fieldset class="col-12">
									<input type="text" name="" placeholder="Nome">
								</fieldset>
								<fieldset class="col-12">
									<input type="text" name="" placeholder="E-mail">
								</fieldset>
								<fieldset class="col-12">
									<textarea placeholder="Mensagem"></textarea>
								</fieldset>
								<fieldset class="col-12">
									<button class="button enviar"><i class="fa fa-send" aria-hidden="true"></i> Enviar</button>
								</fieldset>
							</form>
						</div>

						<div class="col-4">
							<h3>Contato</h3>
							E-mail: <?php the_field('email','option'); ?><br>
							Telefone: <?php the_field('telefone','option'); ?><br>
							Celular: <?php the_field('celular','option'); ?>

							<?php if( have_rows('redes_sociais','option') ): ?>
								<div class="redes">						
									<?php while ( have_rows('redes_sociais','option') ) : the_row(); ?>
										<a href="<?php the_sub_field('url','option'); ?>" title="<?php the_sub_field('nome','option'); ?>" target="_blank">
											<?php the_sub_field('icone','option'); ?>
										</a>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>
						</div>

					</div>
				</div>
			</section>

		<?php } ?>

		<script type="text/javascript">
			jQuery(window).load(function(){

			});
		</script>

	<?php endwhile;	?>

<?php get_footer(); ?>