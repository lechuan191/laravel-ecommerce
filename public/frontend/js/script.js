function productview(id) {
    $.ajax({
        url: "{{ url('/cart/product/view/') }}/" + id,
        type: "GET",
        dataType: "json",
        success: function(data) {
            $('#pcode').text(data.product.product_code);
            $('#pcat').text(data.product.category_name);
            $('#psub').text(data.product.subcategory_name);
            $('#pbrand').text(data.product.brand_name);
            $('#pname').text(data.product.product_name);
            $('#pimage').attr('src', data.product.image_one);
            $('#product_id').val(data.product.id);

            var d = $('select[name="color"]').empty();
            $.each(data.color, function(key, value) {
                $('select[name="color"]').append('<option value="' + value + '">' + value + '</option>');
            });

            var d = $('select[name="size"]').empty();
            $.each(data.size, function(key, value) {
                $('select[name="size"]').append('<option value="' + value + '">' + value + '</option>');
            });


        }
    })
}