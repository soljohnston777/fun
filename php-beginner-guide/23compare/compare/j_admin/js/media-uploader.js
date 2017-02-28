jQuery(document).ready(function() {
	jQuery('.image-upload-button').colorbox({
		width:"600", 
		height:"225", 
		iframe:true,
	});

	/*
	jQuery(".close").click(function() {
		jQuery("#image-upload-input").val('money');
		alert('Try this');
		parent.$.fn.colorbox.close();
	});
	*/
	
	/*
	window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		jQuery('#image-upload-input').val(imgurl);
		//uploadID.val(imgurl); 
		
	};
	*/
});