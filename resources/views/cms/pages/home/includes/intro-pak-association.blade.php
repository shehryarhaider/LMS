
<script type="text/javascript">

  $(document).ready(function () {

    // updates the home header in the database via AJAX
    $('#IntroPakAssociationHeader').click(function(){
      var formData = new FormData();
      formData.append("_token", $('#token').val());


      formData.append("heading", $('.PakAssociationHeading').val());
    
      formData.append("text", $('.PakAssociationText').val());
     
      axios.post('{{route('padeaf.home.pak_association_update')}}', formData, {
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
