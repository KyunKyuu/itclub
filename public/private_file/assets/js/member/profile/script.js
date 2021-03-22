$(document).ready(function() {
    $('#advancedProfile').on('click', function() {
            $('#social-media').removeClass('d-none');
    })
    $('#advancedProfile').on('dblclick', function() {
            $('#social-media').addClass('d-none');
    })

    $('#insert-profile').on('submit', function(e) {
        e.preventDefault()
        let data = FormData(this)
        data.append('user_id', $(this).data('id'))
        $.ajax({
            url:'/api/v1/member/profile',
            data:data,
            type:'POST',
            headers:{
                'X-CSRF-TOKEN':csrftoken
            },
            processData:false,
            contentType:false,
            success:res=>{
                console.log(res);
            },
            error:err=>console.log(err)
        })
    })

})
