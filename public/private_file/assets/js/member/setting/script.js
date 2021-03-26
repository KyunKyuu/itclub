$(document).ready(function() {
    $('#seeNewPassword').on('click', function() {
        SeePassword({idPassword : 'newPassword', idButton : 'seeNewPassword'});
    })

    $('#seeOldPassword').on('click', function() {
        SeePassword({idPassword : 'oldPassword', idButton : 'seeOldPassword'});
    })

    $('#changePassword').on('submit', function(e) {
        e.preventDefault();
        if ($('#changePassword input[name="oldpassword"]').val() == '' || $('#changePassword input[name="newpassword"]').val() == '') {
            $('#alert').html(` <div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>Isi dulu atuhhh.</div></div>`)
            return 0;
        }
        $.ajax({
            url:'/api/v1/member/setting/changepassword',
            data:new FormData(this),
            type:'POST',
            processData:false,
            contentType:false,
            headers:{
                'X-CSRF-TOKEN':csrftoken
            },
            success:res=>{
                $('#alert').html(` <div class="alert alert-${res.status} alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>${res.message}</div></div>`)
                return 0;
            },
            error:err=>{
                $('#alert').html(` <div class="alert alert-${err.status == 404 ? 'danger' : 'warning'} alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>${err.responseJSON.message}</div></div>`)
                return 0;
            }
        })
    })

})
