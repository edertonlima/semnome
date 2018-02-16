<?php get_header(); ?>

	<section class="box-content no-padding header-page" style="background-image: url('http://dante.swiftideas.com/wp-content/uploads/2013/03/parallax_bridge1.jpg');">
		<div class="mask"><div class="container"><div><span>Serviços</span></div></div></div>
	</section>

		<section class="box-content no-height amarelo">
			<div class="container">
				
				<div class="content-post">
					<div class="row">
						<div class="col-12 justify-center">
							<p>Etiam nec aliquam arcu. Vestibulum consectetur purus et turpis ultrices vulputate. Donec pretium sagittis magna id euismod. Ut gravida dui eu nibh feugiat, sed rutrum nisl congue. In tortor urna, facilisis at blandit vitae, porttitor in augue. Pellentesque quis elementum massa. Nam dolor ipsum, porttitor ac eleifend quis, rutrum non orci. Pellentesque sit amet augue ornare, dapibus neque in, sollicitudin mi. Donec dapibus nisl vestibulum eros eleifend cursus. In consequat ligula non dui vehicula hendrerit.</p>
						</div>
					</div>
				</div>

			</div>
		</section>

	<section class="box-content no-height no-padding">
		<div class="servicos-home">	
			<ul>

				<?php 
				$count_servico = 0;
				while ( have_posts() ) : the_post(); 
					$count_servico = $count_servico+1;
					$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>

					<li class="item-home-servico" style="background-image: url('<?php echo $imagem[0]; ?>');">

						<h3><?php the_title(); ?>
							<a href="<?php the_permalink(); ?>" class="button saiba-mais-inline">
								<i class="fa fa-angle-right" aria-hidden="true"></i>
								saiba mais
							</a>
						</h3>

					</li>

					<?php if($count_servico == 5){ 
						$count_servico = 0 ?>
						</ul>
						<ul>
					<?php } ?>

				<?php endwhile;	?>

			</ul>
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