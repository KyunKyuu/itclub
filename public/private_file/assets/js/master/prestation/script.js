$(document).ready(function() {
    const data = [
        {data:'check', name:'check', orderable:false, searchable:false},
        {data:'name', name:'name'},
        {data:'images', name:'images'},
        {data:'created_at', name:'created_at', searchable:false, orderable:false},
        {data:'updated_at', name:'updated_at', orderable:false},
        {data:'btn', name:'btn', searchable:false, orderable:false},
    ];

    Table({table:'#table', data:data, url:'/api/v1/prestation/get'});

    $('#insert').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            url:'/api/v1/prestation/insert',
            data:new FormData(this),
            processData:false,
            contentType:false,
            type:'POST',
            headers:{
                'X-CSRF-TOKEN':csrftoken
            },
            success:res=>{
                RefreshTable('table');
                SweetAlert(res);
            },
            error:err=>console.log(err)
        })
    })

    $('#table').on('click', '#delete', function(e) {
        e.preventDefault()
        let id = $(this).data('value')
        $.ajax({
            url:'/api/v1/prestation/delete',
            data:{
                id:id
            },
            type:'DELETE',
            headers:{
                'X-CSRF-TOKEN':csrftoken
            },
            success:res=>{
                RefreshTable('table');
                SweetAlert(res);
            },
            error:err=>console.log(err)
        })
    })

    $('#table').on('click', '#edit', function(e) {
        e.preventDefault();
        let id = $(this).data('value')
        $.ajax({
            url:'/api/v1/prestation/get',
            data:{
                id:id
            },
            success:res=>{
               $('#updatePrestation').modal('show');
                $('#updatePrestation input[name="name"]').val(res.data.name);
                $('#updatePrestation input[name="image"]').val(res.data.image);
                $('#updatePrestation input[name="name"]').data('id',res.data.id);
                $('#updatePrestation input[name="content"]').val(res.data.content);
            },
            error:err=>console.log(err)
        })
    })

})
