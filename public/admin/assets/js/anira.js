
let PartnerRow=0;
let PreProductRow=0;
$("#add_morepartner").click(
    function () {

        var partner_name = $('#partner_name').val();
        var partner_pan = $('#partner_pan').val();
        var partner_dob = $('#partner_dob').val();
        var partner_anniversary = $('#partner_anniversary').val();

        let template = '<div id="partner" class="row"><div class="col-md-4"><div class="mb-3"><input id="partner_details" type="text" name="partner_details['+PartnerRow+'][name]" value="'+partner_name+'" class="form-control" readonly/></div></div><div class="col-md-2"><div class="mb-3"><input id="partner_details" type="text"  value="'+partner_pan+'" name="partner_details['+PartnerRow+'][pan]" class="form-control" readonly/></div></div><div class="col-md-2"><div class="mb-3"><input id="partner_details" type="date"  value="'+partner_dob+'" name="partner_details['+PartnerRow+'][dob]" class="form-control" readonly/></div></div><div class="col-md-2"><div class="mb-3"><input id="partner_details" type="date"  value="'+partner_anniversary+'" name="partner_details['+PartnerRow+'][anniversary]" class="form-control" readonly/></div></div><div class="col-md-2" ><button type="button" id="Deleteparter" class="btn btn-danger mr-2">X</button></div></div>';

        $(".morepartner").append(template);

        $('#partner_name').val('');
        $('#partner_pan').val('');
        $('#partner_dob').val('');
        $('#partner_anniversary').val('');
        PartnerRow++;

    }
);
$("body").on("click", "#Deleteparter", function () {
    $(this).parents("#partner").remove();
    PartnerRow--;
})

//previous product
$("#add_item").click(
    function () {

        var name = $('#previous_product_details_name').val();
        var brand = $('#previous_product_details_brand').val();

        let template = '<div id="product" class="row"> <div class="col-md-5"><div class="mb-3"><input id="previous_product_details" type="text" name="previous_product_details['+PreProductRow+'][name]"  value="'+name+'" class="form-control" readonly/></div></div><div class="col-md-5"><div class="mb-3"><input id="previous_product_details" type="text" name="previous_product_details['+PreProductRow+'][brand]"  value="'+brand+'" class="form-control" readonly/></div></div><div class="col-md-2"><button type="button" id="Deleteproduct" class="btn btn-danger">X</button></div></div>';

        $(".previous_productitems").append(template);

        $('#previous_product_details_name').val('');
        $('#previous_product_details_brand').val('');
        PreProductRow++;
    }
);

$("body").on("click", "#Deleteproduct", function () {
    $(this).parents("#product").remove();
    PreProductRow--;
})

 //support document
 $("#add_document").click(
    function () {

        let template = '<div id="document" class="row"> <div class="col-md-5"><div class="form-group"><input id="support_document" type="file" name="document[]" class="form-control"/></div></div><div class="col-md-2"><a id="Deletedocument" class="btn btn-danger mr-2">Remove</a></div></div>';

        $(".support_document").append(template);
    }
);

$("body").on("click", "#Deletedocument", function () {
    $(this).parents("#document").remove();
})


//state change
// $('#state').on('change', function () {
//     let state_id = this.value;
//     $.ajax({
//         url: "city/"+state_id,
//         type: "get",

//         success: function (res) {
//             let html = "";
//             html += '<select id="city" type="text" name="city" search class="form-control">';
//             res.forEach((val, key) => {
//                 html += "<option value=" + val.id + ">" + val.name + "</option>";
//             });
//             html += '</select>';
//             $("#city").html("");
//             $("#city").html(html);
//         },
//     });
// });

//state change
$('#state_id').on('change', function () {
    let state_id = this.value;
    $.ajax({
        url: "/admin/city/"+state_id,
        type: "get",

        success: function (res) {
            let html = "";
            html += '<select id="city_id" type="text" name="city_id" class="form-control">';
            res.forEach((val, key) => {
                html += "<option value=" + val.id + ">" + val.name + "</option>";
            });
            html += '</select>';
            $("#city_id").html("");
            $("#city_id").html(html);
        },
    });
});


//business type for proitership
$('#establishment_type').on('change', function () {
    let type = this.value;
    if(type==1 || type == 3 || type == 4){
        $('.partner').attr('style', 'display:none;');
    }else{
         $('.partner').removeAttr('style');
    }
});


//add order page
$('#customer_id').on('change', function () {
    let vendor_id = this.value;
    $.ajax({
        url: "/admin/order/vendor/"+vendor_id,
        type: "get",

        success: function (res) {
            console.log(res.vendor.id);
            let name_html = "";
            let email_html = "";
            let mobile_html = "";
            let state_html = "";
            let city_html = "";

            name_html += '<div class="form-group"><label class="col-form-label">Name Of Customer</label><input id="customer_name" value="'+res.vendor.name_of_establishment+'" type="text" name="customer_name" class="form-control"/></div>';

            email_html += '<div class="form-group"><label class="col-form-label">Email</label><input id="email" value="'+res.vendor.email+'" type="text" name="email" class="form-control"/></div>';

            mobile_html += '<div class="form-group"><label class="col-form-label">Mobile</label><input id="mobile" value="'+res.vendor.mobile+'" type="text" name="mobile" class="form-control"/></div>';


            $(".vendor_name").html("");
            $(".vendor_name").html(name_html);

            $(".vendor_email").html("");
            $(".vendor_email").html(email_html);

            $(".vendor_mobile").html("");
            $(".vendor_mobile").html(mobile_html);
        },
    });
});


//Add more Products
// $("#add_product").click(
//     function () {

//         let template = ' <tr><td><select id="product_id" type="text" name="product_id[]" class="form-control-sm"><option value="" >Select Product Name</option> </select></td><td><input id="quantity" type="number" name="quantity[]" class="form-control"/></td><td> <input id="unit" type="number" name="unit[]" class="form-control"/></td><td><input id="unit_price" type="decimal" name="unit_price[]" class="form-control"/></td><td><input id="total_price" type="decimal" name="total_price[]" class="form-control"/> </td><td><a id="Deleteproduct" class="btn btn-danger mr-2">Remove</a></td> </tr>';

//         $("#moreProduct").append(template);
//     }
// );

// $("body").on("click", "#Deleteproduct", function () {
//     $(this).parents("#product").remove();
// })


    function calculateValueByTextChange() {
        $(this).change(function(){
            var quantity = $('#input_quantity').val();
            var unit_price = $('#input_unit_price').val();
            $('#input_total_price').val(quantity * unit_price);
        });
    }

    function openModel(id)
    {
        var url = "/admin/order-items/" + id;
        var modelHtml = "";
        $("#orderItemsmodel").modal('show');

        $.ajax({
            url: url,
            type: "get",
            success: function (res) {
                console.log(res);
                let html = "";
                res.forEach((val, key) => {

                    html += "<tr><td>" + val.product.name +  "</td><td>" + val.packing_size + "</td><td>" + val.quantity + "</td><td>" + val.unit + "</td><td>" + val.unit_price + "</td><td>" + val.total_price + "</td></tr>";
                });

                // $("#product_items").html("");
                $("#product_items").html(html);
            },
        });
    }

    //Modal image
    function imageView(id) {
        var modal = document.getElementById("modalImg");

        var img = document.getElementById("imgV"+id);
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");

        modal.style.display = "block";
        modalImg.src = img.src;
        captionText.innerHTML = img.alt;

    }

    function closeModal() {
        var modal = document.getElementById("modalImg");
        modal.style.display = "none";
    }


// confirmation
function confirmationDelete(type,id)
{
    var url ='';
    if(type == 'user'){
        url = 'user-delete/'+id;
    }else if(type == 'departments'){
        url = 'departments/'+id;
    }else if(type == 'designation'){
        url = 'designation/'+id;
    }else if(type == 'product'){
        url = 'product/'+id;
    }else if(type == 'team'){
        url = 'team/'+id;
    }else if(type == 'packing'){
        url = 'packing/'+id;
    }else if(type == 'visit'){
        url = 'visit/'+id;
    }else if(type == 'vendor'){
        url = 'vendor/'+id;
    }
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, cancel it!',
        cancelButtonText:'Cancel',
        allowOutsideClick:false,

        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-danger ms-1',
            container: 'swal-container-hold',
        },
        buttonsStyling: false
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url:url,
                type: "DELETE",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log(data);
                    if(data.status == '200'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            confirmButtonText:'Ok',
                            text: data.message,
                            customClass: {
                            confirmButton: 'btn btn-success'
                            }
                        }).then(function(success){
                            location.reload();
                        });
                    }else{
                        Swal.fire({
                            title:  'Cancelled!',
                            text: 'Item can not be deleted',
                            confirmButtonText:'Ok',
                            icon: 'error',
                            allowOutsideClick:false,
                            customClass: {
                            confirmButton: 'btn btn-success',
                            container: 'swal-container-hold',
                            }
                        });
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    var err = JSON.parse(xhr.responseText);
                    Swal.fire({
                        title:  'Cancelled!',
                        text: err.message,
                        icon: 'error',
                        allowOutsideClick:false,
                        customClass: {
                        confirmButton: 'btn btn-success'
                        }
                    });

                },

            });
        }
    });
}


function confirmationStatus(type,id)
{
    var url ='';
    if(type == 'user'){
        url = 'user/change-status/'+id;
    }else if(type == 'departments'){
        url = 'departments/change-status/'+id;
    }else if(type == 'designation'){
        url = 'designation/change-status/'+id;
    }else if(type == 'team'){
        url = 'team/change-status/'+id;
    }else if(type == 'product'){
        url = 'product/change-status/'+id;
    }else if(type == 'packing'){
        url = 'packing/change-status/'+id;
    }else if(type == 'vendor'){
        url = 'vendor/change-status/'+id;
    }
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, change it!',
        cancelButtonText:'Cancel',
        allowOutsideClick:false,

        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-danger ms-1',
            container: 'swal-container-hold',
        },
        buttonsStyling: false
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url:url,
                type: "GET",
                // data    : { _token: '{{csrf_token()}}'},
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log(data);
                    if(data.status == '200'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            confirmButtonText:'Ok',
                            text: data.message,
                            customClass: {
                            confirmButton: 'btn btn-success'
                            }
                        }).then(function(success){
                            location.reload();
                        });
                    }else{
                        Swal.fire({
                            title:  'Cancelled!',
                            text: 'Status can not be changed',
                            confirmButtonText:'Ok',
                            icon: 'error',
                            allowOutsideClick:false,
                            customClass: {
                            confirmButton: 'btn btn-success',
                            container: 'swal-container-hold',
                            }
                        });
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    var err = JSON.parse(xhr.responseText);
                    Swal.fire({
                        title:  'Cancelled!',
                        text: err.message,
                        icon: 'error',
                        allowOutsideClick:false,
                        customClass: {
                        confirmButton: 'btn btn-success'
                        }
                    });

                },

            });
        }
    });
}

//upload image preview
if( $('#upload').length ) {
    upload.onchange = evt => {
        const [file] = upload.files
        if (file) {
            avatarPreview.src = URL.createObjectURL(file)
        }
    }
}

//Delete Product Image

function deleteImge(id,model,imageId=null){
    var modelType='';
    if(model=='product'){
        modelType = 'Product';
    }

    $.ajax({
        url: "/admin/product/image/delete",
        type: "post",
        data: {
            id:id,
            modelType : modelType,
            imageId:imageId
        },
        datatype: "json",
        processData:true,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    })
    .done(function(data){
        console.log(data);
        location.reload();
        $("#msg").empty().html(data.msg);
    })
    .fail(function(jqXHR, ajaxOptions, thrownError){
        alert('No response from server');
    });


}








