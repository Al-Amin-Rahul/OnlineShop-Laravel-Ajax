$(function(){
    $(document).on("submit", "#applyCoupon", function(e){
        let url = $(this).attr("action");
        let method = $(this).attr("method");
        let data = $(this).serialize();

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
                $("#GrandTotal").text(data.newTotal);
                $("#newOrderTotal").val(data.newTotal);
                $("#userId").val(data.user_id);
                $("#couponId").val(data.coupon_id);
                $("#code").text(data.code);
                $("#alert").text(data.alert);
                
            }
        });
        e.preventDefault();
    });
});