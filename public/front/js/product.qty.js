$(function(){
    $(document).on("change", "#productQty", function(event){
        event.preventDefault();
        let val =   $("#productQty").val();
        if(val)
        {
            $("#cartQty").val(val);
        }

    })
})