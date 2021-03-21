$(document).ready(function() {
    const data = [
        {data:'check', name:'check', orderable:false, searchable:false},
        {data:'name', name:'name'},
        {data:'role_id', name:'role_id', },
        {data:'email', name:'email', searchable:false, orderable:false},
        {data:'email_verified_at', name:'email_verified_at'},
        {data:'status', name:'status', orderable:false},
        {data:'btn', name:'btn', searchable:false, orderable:false},
    ];

    Table({table:'#table', data:data, url:'/api/v1/user/get'});

    $('#modalInsert').on('click', function() {
        $('#insertUser').modal('show');
        $('#insertUser form').attr('id', 'insert');
        $('#insertUser input[name="passwd"]').attr('required', true)
    })

    $('#insertUser').on('submit',  '#insert', function (e) {
        e.preventDefault()
        $.ajax({
            url:'/api/v1/user/insert',
            data:new FormData(this),
            processData:false,
            contentType:false,
            headers:{
                'X-CSRF-TOKEN' : csrftoken
            },
            type:'POST',
            success:res=>{
                RefreshTable('table')
                SweetAlert(res)
            },
            error:err=>console.log(err)
        })
    })

    $('#insertUser').on('submit',  '#update', function (e) {
        e.preventDefault()
        let data = new FormData(this);
        data.append('user_id', $('#insertUser input[name="name"]').data('id'))
        $.ajax({
            url:'/api/v1/user/update',
            data:data,
            processData:false,
            contentType:false,
            headers:{
                'X-CSRF-TOKEN' : csrftoken
            },
            type:'POST',
            success:res=>{
                RefreshTable('table')
                SweetAlert(res)
            },
            error:err=>console.log(err)
        })
    })

    $('#table').on('click',  '#delete', function (e) {
        e.preventDefault()
        $.ajax({
            url:'/api/v1/user/delete',
            data:{
                user_id:$(this).data('value')
            },
            headers:{
                'X-CSRF-TOKEN' : csrftoken
            },
            type:'DELETE',
            success:res=>{
                RefreshTable('table')
                SweetAlert(res)
            },
            error:err=>console.log(err)
        })
    })

    $('#table').on('click', '#edit', function() {
        let id = $(this).data('value')
        $('#insertUser select[name="role_id"] option').attr('selected', false)
        $('#insertUser input[name="passwd"]').attr('required', false)
        $.ajax({
            url:'/api/v1/user/get',
            data:{
                id:id
            },
            success:res=>{
                $('#insertUser').modal('show');
                $('#insertUser form').attr('id', 'update');
                $('#insertUser input[name="name"]').val(res.data.name)
                $('#insertUser input[name="passwd"]').val('')
                $('#insertUser input[name="name"]').data('id', res.data.id)
                $('#insertUser input[name="email"]').val(res.data.email)
                $('#insertUser select[name="role_id"] option[value="'+res.data.role_id+'"]').attr('selected', true)
            },
            error:err=>console.log(err)
        })
    })

})
