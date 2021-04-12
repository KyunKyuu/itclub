$(document).ready(function() {
    $('#seePassword').on('click', function() {
        SeePassword({idPassword : 'password', idButton : 'seePassword'});
    })

    $('#login').on('submit', function(e) {
        e.preventDefault();
        if ($('#username').val() == null || $('#password').val() == null) {
            return 0;
        }
        $.ajax({
            url: '/api/v1/auth/login',
            type:'POST',
            data:new FormData(this),
            processData:false,
            contentType:false,
            headers:{
                'X-CSRF-TOKEN':csrftoken
            },
            success:res=>{
                let color = ''
                if (res.status == 'success') {
                    window.location.href = '/dashboard/general/index';
                }else{
                    $('#message').html(` <div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>${res.message}.</div></div>`)
                }

            },
            error:err=>{
                if (err.status == 419) {
                    SweetAlert({status:'info', message:'Mencoba menghubungkan kembali!'})
                    setTimeout(() => {
                        window.location.href = '/auth/login';
                    }, 2000);
                }
                $('#message').html(` <div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>${err.responseJSON.message}.</div></div>`)
            }
        })
    })
})
