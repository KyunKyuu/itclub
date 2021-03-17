$(document).ready(function(){
    $('#seePassword').on('click', function() {
        SeePassword({idPassword : 'password', idButton : 'seePassword'});
    })

    $('#register').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type:'POST',
            data:new FormData(this),
            url : '/api/v1/auth/register',
            contentType:false,
            processData:false,
            success:res=>{
                console.log(res);
            },
            error:err=>console.log(err)
        })
    })
})
