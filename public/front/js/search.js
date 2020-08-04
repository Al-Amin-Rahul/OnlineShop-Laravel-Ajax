$(function(){
    $(document).on("submit", "#searchProduct", function(event){
        event.preventDefault();
        let url = $(this).attr("action");
        let method = $(this).attr("method");
        let data = $(this).serialize();
        let search  =   $('#searchField').val();

        if(search)
        {
            $.ajax({
                url: url,
                method: method,
                data: data,
                success:function(data)
                {
                    $('#body').html(data);
    
                }
            })
        }

    })
})