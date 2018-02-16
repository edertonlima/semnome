<section class="box-content no-height destaque">
	<div class="container">
		
		<div class="row">
			<div class="col-12">

				<h2>Precisa de um orçamento personalizado?</h2>
				<p class="center">Temos a solução ideal para o que você precisa. Diga-nos o que você precisa e um de nossos técnicos entrarão em contato para ajuda-lo no que for preciso.</p>
				<a href="javascript:" class="button send-box-destaque">
					<i class="fa fa-send" aria-hidden="true"></i>
					solicitar orçamento
				</a>

			</div>
		</div>
	</div>
</section>


<footer class="box-content no-height no-padding footer">		
	<div class="container">
		
		<div class="contanier">

			<p><i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date('Y').' '; the_field('titulo', 'option'); ?> - Todos os direitos reservados.</p>

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
</footer>

<div class="bg-modal" id="modal-orcamento">
	<div class="box-modal">
		<div class="modal-conteudo">

			<i class="fa fa-times close-modal" aria-hidden="true"></i>
		
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
	</div>
</div>

</body>
</html>

<script type="text/javascript">
	jQuery(document).ready(function(){

		jQuery('.send-box-destaque').click(function(){
			jQuery('#modal-orcamento').css('display','table');
		});

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