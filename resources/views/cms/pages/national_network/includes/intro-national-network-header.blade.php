
<script type="text/javascript">

  $(document).ready(function () {

    // updates the home header in the database via AJAX
    $('#IntroNationalNetworkHeader').click(function(){
      var formData = new FormData();
      formData.append("_token", $('#token').val());


      formData.append("heading", $('.IntroNationalNetworkHeading').val());
    
      formData.append("text",  $('.IntroNationalNetworkText').val());
     
      axios.post('{{route('padeaf.national_network.update')}}', formData, {
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
