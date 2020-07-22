
<script type="text/javascript">

  $(document).ready(function () {

    // updates the home header in the database via AJAX
    $('#IntroPakAssociationSection').click(function(){
      var formData = new FormData();
      formData.append("_token", $('#token').val());

      formData.append("text", $('.PakAssociationSectionText').val());

      var imageFile = document.querySelector('#imageUpload1');
      if(imageFile.files[0]){
        formData.append('image',imageFile.files[0]);
      }

      axios.post('{{route('padeaf.home.pak_association_section.update')}}', formData, {
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
