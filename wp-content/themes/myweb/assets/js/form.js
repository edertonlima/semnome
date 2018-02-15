jQuery(document).ready(function(){	
	jQuery('#form-igrejas-parceiras').submit(function(event){
		jQuery('form#form-igrejas-parceiras .btn-igreja').html('ENVIANDO').prop( "disabled", true );
		jQuery('#modal-orcamento .msg').removeClass('erro ok').html('');
		var nome = jQuery('#nome_igrejas').val();
		var email = jQuery('#email_igrejas').val();
		var telefone = jQuery('#telefone_igrejas').val();
		var para = '<?php the_field('email', 'option'); ?>';
		var nome_site = '<?php the_field('titulo', 'option'); ?>';

		var enviar = true;
		if(nome == ''){
			jQuery('#nome_igrejas').parent().addClass('erro');
			enviar = false;
		}

		if(email == ''){
			jQuery('#email_igrejas').parent().addClass('erro');
			enviar = false;
		}

		if(telefone == ''){
			jQuery('#telefone_igrejas').parent().addClass('erro');
			enviar = false;
		}

		if(enviar){
			jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail-igrejas.php", { nome:nome, email:email, telefone:telefone,para:para, nome_site:nome_site }, function(result){		
				if(result=='ok'){
					resultado = 'Pedido de cadastro enviado com sucesso! Obrigado.';
					classe = 'ok';
				}else{
					resultado = result;
					classe = 'erro';
				}
				jQuery('#modal-igrejas-parceiras .msg').addClass(classe).html(resultado);
				jQuery('form#form-igrejas-parceiras').trigger("reset");
				jQuery('form#form-igrejas-parceiras .btn-igreja').html('ENVIAR').prop( "disabled", false );
			});
		}else{
			jQuery('#modal-igrejas-parceiras .msg').addClass('erro').html('Todos os campos são obrigatórios.');
			jQuery('form#form-igrejas-parceiras .btn-igreja').html('ENVIAR').prop( "disabled", false );
		}

		return false;
	});

	jQuery('input').change(function(){
		if(jQuery(this).parent().hasClass('erro')){
			jQuery(this).parent().removeClass('erro');
		}
	});

	jQuery('textarea').change(function(){
		if(jQuery(this).parent().hasClass('erro')){
			jQuery(this).parent().removeClass('erro');
		}
	});
});