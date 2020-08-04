$(function(){
    $(document).on("change", "#wrap", function(event){
        event.preventDefault();
        if(this.checked)
        {
            $("#wrap_val").val(1);
        }
        else
        {
            $("#wrap_val").val(0);
        }

    })
})