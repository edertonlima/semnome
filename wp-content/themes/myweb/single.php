<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php $categories = get_the_category(); //var_dump($categories); ?>

		<section class="box-content no-padding img-destaque header-page no-height" style="background-image: url('<?php the_field('imagem_block') ?>');">
			<div class="mask"><div class="container"><div><span><?php echo $categories[0]->name; ?></span></div></div></div>
		</section>

		<section class="box-content no-height verde projetos det-page">
			<div class="container">
				
				<div class="content-post">

					<div class="row">
						<?php 
							if(get_field('video')){ 

								$val_video = explode('embed/', get_field('video'));
								$val_video = explode('?', $val_video[1])[0]; ?>

								<iframe class="col-4 img-projeto" src="https://www.youtube.com/embed/<?php echo $val_video; ?>" frameborder="0" encrypted-media" allowfullscreen></iframe>
								<div class="col-4 img-projeto" style="background-image: url('https://img.youtube.com/vi/<?php echo $val_video; ?>/maxresdefault.jpg');">
									<i class="fa fa-youtube-play" aria-hidden="true"></i>
								</div>

							<?php }else{
								$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
								if($imagem[0]){ ?>
									<div class="col-4 img-projeto" style="background-image: url('<?php echo $imagem[0]; ?>');"></div>
								<?php }
							}
							
						?>

						<div class="col-8">
							<h2 class=""><?php echo $categories[0]->name; ?></h2>
							<h4 class=""><?php the_title(); ?></h4>
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>

			</div>
		</section>

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

		<?php 
			$galeria = get_field('galeria');
			if( $galeria ): ?>

				<section class="box-content no-height galeria">
					<div class="container">
						<div class="row">

							<?php foreach( $galeria as $imagem ): ?>
								<div class="col-4"><a href="<?php echo $imagem['url']; ?>" class="fancybox" data-fancybox="galeria"><img src="<?php echo $imagem['sizes']['thumbnail']; ?>"/></a></div>
							<?php endforeach; ?>

						</div>
					</div>
				</section>

			<?php endif;
		?>

		<?php //if(is_page('sobre')){
			if(have_rows('info-tec')): ?>

				<section class="box-content no-height info-tec">
					<div class="container">
						
						<div class="content-post">

							<h4>Informações:</h4>

							

								<?php while ( have_rows('info-tec') ) : the_row(); ?>
										
											<p>
												<strong><?php the_sub_field('titulo'); ?></strong>
												<?php the_sub_field('texto'); ?>
											</p>

								<?php endwhile; ?>

							
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

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/fancybox/fancybox.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {		
		jQuery('.fancybox').fancybox();

		jQuery('.fa-youtube-play').click(function(){
			jQuery('.item-sobre-h').removeClass('active');
			jQuery(this).parent().hide();
			jQuery(this).parent().siblings().show().attr('src', jQuery(this).parent().siblings().attr('src') + '?autoplay=1');
		});
	});
</script>
