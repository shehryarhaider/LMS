
<script type="text/javascript">

  $(document).ready(function () {

    // updates the home header in the database via AJAX
    $('#IntroMissionHeader').click(function(){
      var formData = new FormData();
      formData.append("_token", $('#token').val());

      formData.append("heading", $('.MissionHeading').val());

      formData.append("below_heading", $('.MissionBelowHeading').val());

      formData.append("text", $('.MissionText').val());
      

      axios.post('{{route('padeaf.introduction.mission_header.update')}}', formData, {
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
