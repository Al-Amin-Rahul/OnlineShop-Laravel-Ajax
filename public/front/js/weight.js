$(function(){
    $(document).on("change", "#weight", function(event){
        event.preventDefault();
        let val =   $("#weight").val();
        let url =   $('#weight').data('url');
        let id  =   $('#weight').data('id');
        if(val)
        {
            $("#cartWeight").val(val);
            $.ajax({
                url: url+"/"+id+"/"+val,
                type:'GET',
                dataType:'HTML',
                success:function (response) {
                    $("#showPrice").html(response);
                    $("#perfumePrice").val(response);
                    $("#perfume_price_cart").val(response);
                    $("#buyNowBtn").removeClass("btn-link disabled");
                    $("#addCartBtn").removeClass("btn-link disabled");
                }
            })
        }

    })
})
$(document).on("change", "#weightWomen", function(event){
    event.preventDefault();
    let val =   $("#weightWomen").val();
    $("#buyNowBtn").removeClass("btn-link disabled");
    $("#addCartBtn").removeClass("btn-link disabled");
    if(val)
    {
        $("#cartWeight").val(val);
    }
})
$(document).on("change", "#weightMen", function(event){
    event.preventDefault();
    let val =   $("#weightMen").val();
    $("#buyNowBtn").removeClass("btn-link disabled");
    $("#addCartBtn").removeClass("btn-link disabled");
    if(val)
    {
        $("#cartWeight").val(val);
    }
})