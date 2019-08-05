(function($){
	setTimeout(function(){
		$("#titlewrap").css('opacity', 0.5);
		$("#titlewrap").css('pointer-events', 'none');
		$('#titlewrap input[name="post_title"]').attr('disabled', 'disabled');
	}, 50);
})(jQuery)