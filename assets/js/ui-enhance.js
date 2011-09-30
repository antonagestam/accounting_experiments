$(document).ready(function(){
	var clicked = false;
	$('.extra').click(function(e){
		$this = $(this);
		var text = $this.data('note'),
			id = $this.data('id')+'_note_id',
			elem = $('<p>').text(text).attr('id',id)
				.css({
					display:'none',
					width:'200px',
					position:'absolute',
					top:e.pageY+'px',
					left:(e.pageX-115)+'px',
					background:'black',
					color:'white',
					padding:'15px',
				}).click(function(){$(this).fadeOut().remove();});
		if(typeof $('#'+id)[0] == 'undefined'){
			elem.insertAfter($this).fadeIn();
		}else{
			$('#'+id).fadeOut().remove();
		}
	});
});