$(function(){
    $(document).on("change", "#category", function(event){
        event.preventDefault();
        let val =   $("#category").val();
        // console.log(val);
        if(val)
        {
            $.ajax({
                url: '/show-perfume-field/'+val,
                type:'GET',
                dataType:'HTML',
                success:function (response) {
                    let str   = response;
                    let value =   str.substr(1,7);
                    if(value == 'd-block')
                    {
                        $("#pbox").addClass(value);
                    }
                    else
                    {
                        $("#pbox").removeClass('d-block');
                    }
                }
            })
        }

    })
})