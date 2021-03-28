$(document).ready(function(){
    $('#seePassword').on('click', function() {
        SeePassword({idPassword : 'password', idButton : 'seePassword'});
    })

    $('#register').on('submit', function(e) {
        e.preventDefault();
        $('#message').html(` <div class="alert alert-secondary alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>Tunggu! proses ini akan memakan waktu 10 detik.</div></div>`)
        let confirm = ConfirmPassword({idPassword:'password', idConfirmPassword:'password2'});
        if (confirm == 0) {
            $('#message').html(` <div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>Password konfirmasi tidak sama, Coba lagi!.</div></div>`)
            return 0;
        }
        $.ajax({
            type:'POST',
            data:new FormData(this),
            url : '/api/v1/auth/register',
            contentType:false,
            processData:false,
            headers:{
                'X-CSRF-TOKEN' : csrftoken,
            },
            success:res=>{
               $('#message').html(` <div class="alert alert-${res.status == 'success' ? 'success' : 'danger'} alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>${res.message}.</div></div>`)
            },
            error:err=>console.log(err)
        })
    })
})
