<?php get_header(); ?>

	<?php //while ( have_posts() ) : the_post(); ?>

		<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
		<section class="box-content no-padding header-page" style="background-image: url('<?php echo $imagem[0]; ?>');">
			<div class="mask"><div class="container"><div><span><?php the_title(); ?></span></div></div></div>
		</section>

		<section class="box-content no-height">
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
						<div class="row margin-top-40">
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

		<section class="box-content destaque no-height">
			<div class="container">
				
				<h2>Solicite um orçamento agora!</h2>
				<form class="orcamento-unit row">
					<fieldset class="col-6">
						<input type="text" name="" placeholder="Nome">
					</fieldset>
					<fieldset class="col-6">
						<input type="text" name="" placeholder="E-mail">
					</fieldset>
					<fieldset class="col-6">
						<select>
							<option>Idioma Original</option>
							<option>Espanhol</option>
							<option>Inglês</option>
							<option>Português</option>
						</select>
					</fieldset>
					<fieldset class="col-6">
						<select>
							<option>Idioma para Tradução</option>
							<option>Espanhol</option>
							<option>Inglês</option>
							<option>Português</option>
						</select>
					</fieldset>
					<fieldset class="col-12">
						<textarea placeholder="Detalhe do orçamento"></textarea>
					</fieldset>
					<fieldset class="col-12">
						<button class="button send-box-form"><i class="fa fa-send" aria-hidden="true"></i> Enviar</button>
					</fieldset>
				</form>
			</div>
		</section>

		<section class="box-content no-height">
			<div class="servicos-home">

				<h2 class="sub-titulo">Conheça nossos outros serviços</h2>
				
				<ul>
					<?php
						$current_post_ID = $post->ID;
						query_posts(
							array(
								'post_type' => 'servicos',
								'posts_per_page' => 5,
							)
						);

						while ( have_posts() ) : the_post(); 
							if($current_post_ID != $post->ID){
								$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>

								<li class="item-home-servico" style="background-image: url('<?php echo $imagem[0]; ?>');">

									<h3><?php the_title(); ?>
										<a href="<?php the_permalink(); ?>" class="button saiba-mais-inline">
											<i class="fa fa-angle-right" aria-hidden="true"></i>
											saiba mais
										</a>
									</h3>

								</li>
							<?php }
						endwhile;
					?>
				</ul>

				<a href="<?php echo get_home_url(); ?>/servicos" class="button saiba-mais-box">
					<i class="fa fa-wrench" aria-hidden="true"></i>
					visualizar mais serviços
				</a>
			</div>
		</section>

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

	<?php //endwhile;	?>

<?php get_footer(); ?>