(function ($){
	setTimeout(function(){
		$('input#title, .acf-field .acf-input input[type="text"], .acf-field .acf-input textarea, .acf-field .acf-input select').prop('disabled', true).css('color', '#000');
		$('#side-sortables').remove();
		$('.page-title-action').remove();
	}, 50);
}(jQuery))