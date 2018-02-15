jQuery(document).ready(function(){	
	jQuery('.close-modal').click(function(){
		jQuery(this).parents('.bg-modal').hide();
		jQuery('.msg').html('');
	});
});