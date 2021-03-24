$(document).ready(function() {
    const data = [
        {data:'check', name:'check'},
        {data:'title', name:'title'},
        {data:'category', name:'category'},
        {data:'author', name:'author'},
        {data:'created_at', name:'created_at'},
        {data:'status', name:'status'},
    ];

    Table({table:'#table', data:data, url:'/api/v1/features/article/get'});

    $('#category').select2()

    $('#insert').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            url:'/api/v1/features/article/insert',
            type:'POST',
            headers:{
                'X-CSRF-TOKEN':csrftoken
            },
            data:new FormData(this),
            processData:false,
            contentType:false,
            success:res=>{
                RefreshTable('table');
                SweetAlert(res)
            },
            error:err=>{
                SweetAlert({message:err.responseJSON.message, status:err.status == 500 ? 'error' :'warning'})
            }
        })
    })
})
