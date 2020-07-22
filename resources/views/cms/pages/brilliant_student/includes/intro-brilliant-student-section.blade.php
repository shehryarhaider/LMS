
<script type="text/javascript">

  $(document).ready(function () {

    // updates the home header in the database via AJAX
    $('#IntroBSSection').click(function(){
      var formData = new FormData();
      formData.append("_token", $('#token').val());

      formData.append("below_heading", $('.BSBelowHeading').val());

      var imageFile = document.querySelector('#imageUpload1');
      if(imageFile.files[0]){
        formData.append('image',imageFile.files[0]);
      }
     
      var attachment = document.querySelector('#BSAttachment');
      if(attachment.files[0]){
        formData.append('attachment',attachment.files[0]);
      }

      axios.post('{{route('padeaf.brilliant_students.section.update')}}', formData, {
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
