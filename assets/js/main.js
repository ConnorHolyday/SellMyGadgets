$(document).ready(function(){
	$('.view--list').on('click', function(e){
		e.preventDefault();
		$('.display--grid').removeClass('display--grid').addClass('display--list');
	});

	$('.view--grid').on('click', function(e){
		e.preventDefault();
		$('.display--list').removeClass('display--list').addClass('display--grid');
	});
});