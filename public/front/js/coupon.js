$(function(){
    $(document).on("submit", "#applyCoupon", function(e){
        let url = $(this).attr("action");
        let method = $(this).attr("method");
        let data = $(this).serialize();
        let subVal =   $("#subTotal").text();
        let granVal =   $("#GrandTotal").text();
        let wVal     =   $("#giftWrapAmount").text();
        $.ajax({
            url: url,
            method: method,
            data: data,
            beforeSend: function()
            {
                $('#loader').show();
            },
            success: data => {
                $('#loader').hide();
                $("#dis").text(data.dis);
                if(subVal < granVal)
                {
                    $("#GrandTotal").text(parseFloat(data.newTotal) + parseFloat(20));
                    $("#newOrderTotal").val(parseFloat(data.newTotal) + parseFloat(20));
                }
                else if(wVal == 20)
                {
                    $("#GrandTotal").text(parseFloat(data.newTotal) + parseFloat(20));
                    $("#newOrderTotal").val(parseFloat(data.newTotal) + parseFloat(20));
                }
                else{
                    $("#GrandTotal").text(data.newTotal);
                    $("#newOrderTotal").val(data.newTotal);
                }
                $("#userId").val(data.user_id);
                $("#couponId").val(data.coupon_id);
                $("#code").text(data.code);
                $("#alert").text(data.alert);
                
            }
        });
        e.preventDefault();
    });
});