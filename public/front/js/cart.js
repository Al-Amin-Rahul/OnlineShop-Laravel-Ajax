$(function(){
    $(document).on("submit", "#addToCartForm", function(e){
        let url = $(this).attr("action");
        let method = $(this).attr("method");
        let data = $(this).serialize();

        $.ajax({
            url: url,
            method: method,
            data: data,
            success: data => {
                // const Toast = Swal.mixin({
                //     toast: true,
                //     position: 'top-start',
                //     showConfirmButton: false,
                //     timer: 3000,
                //     timerProgressBar: true,
                //     onOpen: (toast) => {
                //         toast.addEventListener('mouseenter', Swal.stopTimer);
                //         toast.addEventListener('mouseenter', Swal.resumeTimer);
                //     }
                // });
                // Toast.fire({
                //     icon: 'success',
                //     title: 'Product Added Successfully'
                // });
                return getCartItems();
            }
        });
        e.preventDefault();
    });
});

$(document).on("submit", "#removeForm", function(arg){
    let url = $(this).attr("action");
    let method = $(this).attr("method");
    let data = $(this).serialize();

    $.ajax({
        url: url,
        method: method,
        data: data,
        success: data => {
            return getCartItems();
        }
    });
    arg.preventDefault();
});

$(document).on("submit", "#updateCart", function(e){
    let url = $(this).attr("action");
    let method = $(this).attr("method");
    let data = $(this).serialize();

    $.ajax({
        url: url,
        method: method,
        data: data,
        success: data => {
            return getCartItems();
        }
    });
    e.preventDefault();
});

function getCartItems()
{
    let url =   $('#cartShow').data('url');
    $.ajax({
        url: url,
        type:'GET',
        dataType:'HTML',
        success:function (response) {
            $("#showCart").html(response);
        }
    })
}

