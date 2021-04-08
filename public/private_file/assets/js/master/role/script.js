$(document).ready(function() {
    const data = [
        {data:'check', name:'check', orderable:false, searchable:false},
        {data:'name', name:'name'},
        {data:'id_role', name:'id_role', },
        {data:'created_by', name:'created_by'},
        {data:'created_at', name:'created_at', searchable:false, orderable:false},
        {data:'updated_at', name:'updated_at', orderable:false},
        {data:'btn', name:'btn', searchable:false, orderable:false},
    ];
    let idrole =''

    Table({table:'#table', data:data, url:'/api/v1/role/get'});

    $('#insert').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            url:'/api/v1/role/insert',
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

    $('#update').on('submit', function(e) {
        e.preventDefault()
        let data = new FormData(this)
        data.append('id', idrole)
        $.ajax({
            url:'/api/v1/role/update',
            data:data,
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
            url:'/api/v1/role/delete',
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
            url:'/api/v1/role/get',
            data:{
                id:id
            },
            success:res=>{
                $('#updateRole').modal('show');
                $('#updateRole input[name="name"]').val(res.data.name);
                idrole = res.data.id
                $('#updateRole input[name="id_role"]').val(res.data.id_role);
            },
            error:err=>console.log(err)
        })
    })

})
