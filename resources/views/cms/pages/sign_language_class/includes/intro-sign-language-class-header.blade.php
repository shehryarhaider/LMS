
<script type="text/javascript">

  $(document).ready(function () {

    // updates the home header in the database via AJAX
    $('#IntroSilClassHeader').click(function(){
      var formData = new FormData();
      formData.append("_token", $('#token').val());


      formData.append("heading", $('.SilClassHeading').val());

      formData.append("text", $('.SilClassText').val());

      var attachment = document.querySelector('#SilAttachment');
      if(attachment.files[0]){
        formData.append('attachment',attachment.files[0]);
      }

      axios.post('{{route('padeaf.interpreter_class.update')}}', formData, {
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
