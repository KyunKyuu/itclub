$(document).ready(function() {
    const data = [
        {data:'error_code', name:'error_code'},
        {data:'title', name:'title'},
        {data:'btn', name:'btn'},
    ];
    Table({table:'#dataPage', data:data, url:'/api/v1/setting/error/get/page'});

    $('#dataPage').on('click', '#Preview', function() {
        let id = $(this).data('value');
        $.ajax({
            url:'/api/v1/setting/error/get/page/'+id,
            success:res=>{
                let html = `
                <div class="container text-center mt-3">
                        <img class="img-fluid" src="/private_file/assets/img/error/${res.data.thumbnail}" alt="image" width="200">
                        <h2 class="title-error">${res.data.title ?? 'No title here??'}</h2>
                            <p class="lead">
                                <small>${res.data.description ?? 'No words here??'}</small>
                            </p>
                                <a href="#" class="btn btn-info mt-4"><i class="fas fa-home"></i> Back to Dashboard</a>
                        <div class="mt-3">
                    </div>
                </div>
                `;
                $('#pagePreview').html(html)
            },
            error:err=>console.log(err)
        })
    })

    $('#insert').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            url:'/api/v1/setting/error/insert/page',
            data:new FormData(this),
            headers:{
                'X-CSRF-TOKEN' : csrftoken
            },
            processData:false,
            contentType:false,
            type:'POST',
            success:res=>{
                RefreshTable('dataPage');
                SweetAlert(res)
            },
            error:err=>{
                SweetAlert({message:err.responseJSON.message, status:err.status == 404 ? 'warning' : 'error'})
            }
        })
    })
})
