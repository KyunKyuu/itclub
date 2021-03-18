$(document).ready(function() {
    const data = [
        {data:'check', name:'check', orderable:false, searchable:false},
        {data:'name', name:'name'},
        {data:'created_by', name:'created_by', orderable:false},
        {data:'comments', name:'action', searchable:false, orderable:false},
        {data:'btn', name:'btn', searchable:false, orderable:false},
    ];

    Table({table:'#table', data:data, url:'/api/v1/preferences/section'});

    $('#insert').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url:'/api/v1/section/insert',
            data:new FormData(this),
            type:'POST',
            contentType:false,
            processData:false,
            headers:{
                'X-CSRF-TOKEN' : csrftoken
            },
            success:res=>{
                SweetAlert(res)
                RefreshTable('table')
            },
            error:err=>console.log(err)
        })
    })

    $('#table').on('click', '#delete', function (e) {
        e.preventDefault();
        let value = $(this).data('value')
        $.ajax({
            url:'/api/v1/section/delete',
            data:{
                value : value
            },
            type:'DELETE',
            headers:{
                'X-CSRF-TOKEN' : csrftoken
            },
            success:res=>{
                SweetAlert(res)
                RefreshTable('table')
            },
            error:err=>console.log(err)
        })
    })
})

