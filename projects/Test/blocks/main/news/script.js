(function($){
	$(function(){
		$('.news__renew').click(function(){
			$.ajax({
				url:"/news/",
				data:{
					mods:{
						view:['ajax', 'list'],
						type:'small'
					},
					vars:{}
				},
				success:function(resp){
					console.log(resp);
					var c = $(resp).find('.news__body');

					$('.news__body').replaceWith(c);
				}
			});
			return false;
		})
	});
})(jQuery);