
<script type="text/javascript">

  $(document).ready(function () {

    // updates the home header in the database via AJAX
    $('#IntroBSHeader').click(function(){
      var formData = new FormData();
      formData.append("_token", $('#token').val());

      formData.append("heading", $('.BSHeading').val());

      formData.append("text", $('.BSBelowHeaderText').val());
     
      axios.post('{{route('padeaf.brilliant_students.update')}}', formData, {
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
