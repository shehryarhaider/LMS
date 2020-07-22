
<script type="text/javascript">

  $(document).ready(function () {

    // updates the home header in the database via AJAX
    $('#IntroLETHeader').click(function(){
      var formData = new FormData();
      formData.append("_token", $('#token').val());

      formData.append("heading", $('.LETHeading').val());

      formData.append("below_heading", $('.LETBelowHeading').val());

      axios.post('{{route('padeaf.education_training.update')}}', formData, {
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
