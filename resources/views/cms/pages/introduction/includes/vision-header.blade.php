
<script type="text/javascript">

  $(document).ready(function () {

    // updates the home header in the database via AJAX
    $('#IntroVisionHeader').click(function(){
      var formData = new FormData();
      formData.append("_token", $('#token').val());


      formData.append("heading", $('.VisionHeading').val());
    
      formData.append("text",  $('.VisionText').val());
     
      var imageFile = document.querySelector('#imageUpload1');
      if(imageFile.files[0]){
        formData.append('image',imageFile.files[0]);
      }

      axios.post('{{route('padeaf.introduction.vision_header.update')}}', formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then(function(res){
        swal(
          'Updated!',
          'Your Settings have been updated.',
          'success'
        )
      }).catch(function(err){
        swal(
          'Failed!',
          err.message,
          'error'
        )
        console.log(err);
      });
    });
  });
</script>
