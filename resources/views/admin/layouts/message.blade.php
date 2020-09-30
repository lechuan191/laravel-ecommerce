<script>
    @if(Session::has('messege'))
    var type="{{Session::get('alert-type')}}"
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
        case 'warning':
          toastr.warning("{{ Session::get('messege') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
    }
    @endif
    $(document).on('click','#deleteRecord',function(e){
        e.preventDefault();
        var link = $(this).attr('href');
        console.log(link);
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href= link;
            } else {
                swal("Your imaginary file is safe!");
            }
        });
    });
  </script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "lengthMenu": [ 5, 10, 20, 30, 50, 100 ],
        });
        // $('#example2').DataTable({
        //   "paging": true,
        //   "lengthChange": false,
        //   "searching": false,
        //   "ordering": true,
        //   "info": true,
        //   "autoWidth": false,
        //   "responsive": true,
        // });
    });
</script>
