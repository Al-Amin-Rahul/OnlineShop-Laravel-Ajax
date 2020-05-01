$(function(){
    // $('#searchField').tokenfield({
    //     autocomplete: {
    //         source: "http://127.0.0.1:8000/productList",
    //         delay: 100
    //     },
    //     showAutocompleteOnFocus: true
    // });

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