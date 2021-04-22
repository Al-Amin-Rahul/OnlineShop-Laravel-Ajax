$( document ).ready(function(){
    let flag    =   false;
    $(document).on("submit", "#addToCartForm", function(e){
        if(!flag)
        {
            flag    =   true;
            let url = $(this).attr("action");
            let method = $(this).attr("method");
            let data = $(this).serialize();

            $.ajax({
                url: url,
                method: method,
                data: data,
                beforeSend: function()
                {
                    $('#moonLoader').removeClass('d-none');
                },
                success: data => {
                    $('#moonLoader').addClass('d-none');
                    flag    =   false;
                    return getCartItems();
                }
            });
            e.preventDefault();
        }
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

