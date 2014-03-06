jQuery(document).ready(function($) {
	//console.log(PUBLICPATH);
	$('div.alert').delay(3000).slideUp(500);

    $('#file_upload').uploadify({
            'swf'      : '../uploadify/uploadify.swf',
            'uploader' : PUBLICPATH + '/uploadify/uploadify.php'

            //'debug' : true
            // Your options here
        });

     $('#edit_file_upload').uploadify({
            'swf'      : '../../uploadify/uploadify.swf',
            'uploader' : PUBLICPATH + '/uploadify/uploadify.php'

            //'debug' : true
            // Your options here
        });

    $('span.delete-image').on('click', function(e){

		e.preventDefault();

		$(this).closest('li').fadeOut('300');

		var data = {
			'image_id' : $(this).prev().attr('alt')
		};

		console.log(data['image_id']);

		$.post(PUBLICPATH + '/images/delete/' + data['image_id'] , data, function(response){
			console.log(response);
			
		});


	});


});
