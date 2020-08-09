$(function(){
    $(document).on("change", "#GiftWrap", function(event){
        event.preventDefault();
        let subVal =   $("#subTotal").text();
        let granVal =   $("#GrandTotal").text();
        if(this.checked)
        {
            if(subVal == granVal)
            {
                let newVal  =   parseFloat(subVal) + parseFloat(20);
                $("#GrandTotal").text(newVal);
                $("#newOrderTotal").val(newVal);
                $("#giftWrapAmount").text(20);
                $("#checkoutWrap").val(1);
            }
            else
            {
                let newVal  =   parseFloat(granVal) + parseFloat(20);
                $("#GrandTotal").text(newVal);
                $("#newOrderTotal").val(newVal);
                $("#giftWrapAmount").text(20);
                $("#checkoutWrap").val(1);
            }
        }
        else
        {
            let newVal  =   parseFloat(granVal) - parseFloat(20);
            $("#GrandTotal").text(newVal);
            $("#newOrderTotal").val(newVal);
            $("#giftWrapAmount").text(0);
            $("#checkoutWrap").val(0);
        }

    })
})