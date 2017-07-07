$(document).ready(function() {
	

	$('.menu-items').mouseenter(function(){
  		$('body').addClass('sidebar-visible');
	});

	$(document).on('click', 'button.test', function(event) {
  	console.log( previousTab+' '+nextTab );
	});

	// binds button's click to input file to change image
	$(document).on('click', '#changeProfileImage', function(event) {
		
		$('#imageInput').trigger('click');
	});

	$(".image-container").mouseenter(function(){
		$("#changeProfileImage").show();
	});

	$(".image-container").mouseleave(function(){
		$("#changeProfileImage").hide();
	});

	$('.container-btn-radio .label-btn-radio').on('click', function() {

		$('.label-btn-radio').removeClass('btn-success');
		$(this).removeClass('btn-default');
		$(this).addClass('btn-success');
	});

	$('.feedLoad-tabs .btn').on('click', function() {
		console.log('clicked');
		$('.feedLoad-tabs .btn').addClass('custom-bordered');
		$(this).removeClass('custom-bordered');
	});


});


/* function reads url of chosen file and set the preview of that file*/
function readURL(input) {

	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
		    $('#proImage').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
		
		// call function to upload image
		uploadImage();

	}
}


function uploadImage() {

	 	var file_data = $('#imageInput').prop('files')[0];
    var form_data = new FormData();                  
    form_data.append('profile_image', file_data);
    $.ajax({
                url: baseurl+user+'/profile_img', // point to server-side PHP script 
                dataType: 'JSON',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(response){
                  
                  alertify.dismissAll();
                  if ( response.status == 0 ) {

              			alertify.error( response.data.error );
                  } else {
                  	
              			alertify.success( "Profile updated successfully" );
                  }
                  
                }
     });
}