
<script type="text/javascript">

  $(document).ready(function () {
    var table = $('#BelowIntroList').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("image_section.datatable") }}',
        "columns": [
          { "data": "id", "defaultContent": "", "className": "text-center" },
          { "data": "icon", "defaultContent": "" },
          { "data": "id", "defaultContent": "", "className": "text-center" },
        ],
        "columnDefs": [{
          "targets": 'no-sort',
          "orderable": false,
        },
        {
          "targets": 0,
          "render": function (data, type, row, meta) {
            return meta.row + 1;
          },
        },
        {
          "targets": 1,
          "render": function(data,type,row,meta){
            var url = "{{getConfig('files_link')}}";
            return `<img src='`+url+data+`' height="50px" />`;
          },
        },
        {
          "targets": -1,
          "render": function (data, type, row, meta) {
            var edit = '{{route("image_section.edit",":id")}}';
            edit = edit.replace(':id', data);
            var checked = row.status == 1 ? 'checked' : null;
            return `
            <a href="` + edit + `" class="text-info p-1" data-original-title="Edit" title="" data-placement="top" data-toggle="tooltip">
                <i class="fa fa-pencil"></i>
            </a>
            <a href="javascript:;" class="ImageSectionDelete text-danger p-2" data-original-title="Delete" title="" data-placement="top" data-toggle="tooltip" data-id="`+ data + `">
                <i class="fa fa-trash-o"></i>
            </a>
            <input class="ImageSectionStatus" type="checkbox" data-plugin="switchery" data-color="#bfa162" data-size="small" ` + checked + ` value="` + row.id + `">
            `;
          },
        },
        ],
      "drawCallback":function(settings){
        var elems = Array.prototype.slice.call(document.querySelectorAll('.ImageSectionStatus'));
        if(elems){
          elems.forEach(function (html) {
              var switchery = new Switchery(html, {
                color: '#002644'
                , secondaryColor: '#dfdfdf'
                , jackColor: '#fff'
                , jackSecondaryColor: null
                , className: 'switchery'
                , disabled: false
                , disabledOpacity: 0.5
                , speed: '0.1s'
                , size: 'small'
              });

            }); 
        }
        $('.ImageSectionStatus').change(function(){
          var $this = $(this);
          var $id = $(this).val();
          var status = this.checked;
          if (status) {
              status = 1;
            } else {
              status = 0;
          }
          axios
            .post('{{route("image_section.status")}}',{
              _token: "_token",
              _method: "patch",
              id: id,
              status: status,
            })
            .then(function(reponse){
              console.log(response);
            })
            .catch(function(error){
              console.log(error);
            });
        });
        $('.ImageSectionDelete').click(function () {
            var deleteId = $(this).data('id');
            var $this = $(this);

            swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#4fa7f3',
              cancelButtonColor: '#d57171',
              confirmButtonText: 'Yes, delete it!'
            }).then(function (result) {
              if (result.value) {
              axios
                .post('{{route("image_section.destroy")}}', {
                  _method: 'delete',
                  _token: '{{csrf_token()}}',
                  id: deleteId,
                })
                .then(function (response) {
                  console.log(response);

                  swal(
                    'Deleted!',
                    'Your item has been deleted.',
                    'success'
                  )

                  table
                    .row($this.parents('tr'))
                    .remove()
                    .draw();
                })
                .catch(function (error) {
                  console.log(error);
                  swal(
                    'Failed!',
                    error.message,
                    'error'
                  )
                });
              }
            })
          });
      },
    });
  });
</script>
