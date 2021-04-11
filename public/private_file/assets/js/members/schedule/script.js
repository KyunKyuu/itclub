$(document).ready(function() {


    $('#TambahData').on('click', function() {
        $('#insertSchedule').modal('show')
        $('#insertSchedule form').attr('id', 'insert')
    })

    $('#insertSchedule').on('submit', '#insert', function(e) {
        e.preventDefault();
        $.ajax({
            url:'/api/v1/members/schedule/insert',
            type:'post',
            headers:{
                'X-CSRF-TOKEN':csrftoken
            },
            contentType:false,
            processData:false,
            data:new FormData(this),
            success:res=>{
                SweetAlert(res)
            },
            error:res=>{
                SweetAlert(res.responseJSON)
            }
        })
    })
})
