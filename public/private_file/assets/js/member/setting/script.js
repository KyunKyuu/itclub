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
    })

})
