$(document).ready(function() {
    $('#seeNewPassword').on('click', function() {
        SeePassword({idPassword : 'newPassword', idButton : 'seeNewPassword'});
    })

    $('#seeOldPassword').on('click', function() {
        SeePassword({idPassword : 'oldPassword', idButton : 'seeOldPassword'});
    })

})
