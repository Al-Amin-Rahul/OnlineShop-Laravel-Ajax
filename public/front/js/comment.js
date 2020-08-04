$(function(){
    $(document).on('submit','#commentForm', function(e){
        e.preventDefault();
        let url     =   $(this).attr('action');
        let method  =   $(this).attr('method');
        let data    =   $(this).serialize();
        
        $.ajax({
            url: url,
            method: method,
            data: data,
            type: "JSON",
            success: data =>{
                return getComments();
            }
        });
    })
});

function getComments()
{
    let id   =   $('#commentShow').data('id');
    let url  =   $('#commentShow').data('url');

    if(id)
    {
        $.ajax({
            url: url+'/'+id,
            type:'GET',
            dataType:'HTML',
            success:function (response) {
                $("#showComment").html(response);
            }
        })
    }
}