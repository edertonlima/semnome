	<footer class="box-content no-padding footer" style="display: none; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/img5.jpg');">
		<div class="mask">
			<div class="container table">
				<div class="table-cell">
					<div class="contanier">
						<div class="row">

						<div class="col-6">
							<h1>
								<a href="<?php echo get_home_url(); ?>" title="<?php the_field('titulo', 'option'); ?>">
									<img src="<?php the_field('logo_header', 'option'); ?>" alt="<?php the_field('titulo', 'option'); ?>">
								</a>
							</h1>
						</div>

						<div class="col-6">
							<h2 class="">contato</h2>
							<h4 class="">Em caso de dúvidas, fale conosco</h4>

							<div class="box-info-contato">
								<div class="info-contato info-email">
									<div class="item">
										<span class="det-item">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a>
										</span>
									</div>
								</div>

								<div class="info-contato info-tel">
									<div class="item">
										<span class="det-item"> <i class="fa fa-phone" aria-hidden="true"></i><?php the_field('telefone_1', 'option'); ?></span>
									</div>
								</div>
							</div>

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
				</div>
			</div>

		</div>
	</footer>

</body>
</html>

<script type="text/javascript">
	jQuery(document).ready(function(){

		/*
		jQuery('.contato-foto').height(jQuery('.contato-info').height());

		// FORM
		jQuery(".enviar").click(function(){
			jQuery('.enviar').html('SENDING').prop( "disabled", true );
			jQuery('.msg-form').removeClass('erro ok').html('');
			var nome = jQuery('#nome').val();
			var email = jQuery('#email').val();
			var mensagem = jQuery('#mensagem').val();
			var para = '<?php the_field('email', 'option'); ?>';
			var nome_site = '<?php bloginfo('name'); ?>';

			if(nome == ''){
				jQuery('#nome').parent().addClass('erro');
			}

			if(email == ''){
				jQuery('#email').parent().addClass('erro');
			}

			if(mensagem == ''){
				jQuery('#mensagem').parent().addClass('erro');
			}

			if((nome == '') || (email == '') || (mensagem == '')){
				jQuery('.msg-form').html('Campos obrigatórios não podem estar vazios.').addClass('erro');
				jQuery('.enviar').html('SEND').prop( "disabled", false );
			}else{
				jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome:nome, email:email, mensagem:mensagem, para:para, nome_site:nome_site }, function(result){		
					if(result=='ok'){
						resultado = 'Enviado com sucesso! Obrigado.';
						classe = 'ok';
					}else{
						resultado = result;
						classe = 'erro';
					}
					jQuery('.msg-form').addClass(classe).html(resultado);
					jQuery('.contato').trigger("reset");
					jQuery('.enviar').html('SEND').prop( "disabled", false );
				});
			}
		});
		*/		
	});

	jQuery(window).resize(function(){
		//jQuery('.contato-contato').height(jQuery('.contato-info').height());
	});

</script>