// delete data
$(document).on('click', '#deleteRecord', function(e) {
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
            window.location.href = link;
        } else {
            swal("Your imaginary file is safe!");
        }
    });
});
// Datatable
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        "lengthMenu": [10, 20, 30, 40, 50, 100],
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

// Display preview selected image in input type file using JQuery
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image_one_preview').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$("#image_one").change(function() {
    readURL(this);
});

function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image_two_preview').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$("#image_two").change(function() {
    readURL2(this);
});

function readURL3(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image_three_preview').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$("#image_three").change(function() {
    readURL3(this);
});

// change status