$(document).ready(function() {

    $('#AlertModa').modal('show')

    $('#savePost').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            url:'/api/v1/features/article/save_content',
            data:new FormData(this),
            type:'POST',
            processData:false,
            contentType:false,
            headers:{
                'X-CSRF-TOKEN' : csrftoken,
            },
            success:res=>{
                SweetAlert(res);
            },
            error:err=>{
                console.log(err.responJSON);
            }
        })
    })
})
