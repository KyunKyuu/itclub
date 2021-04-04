$(document).ready(function() {
    const data = [
        {data:'check', name:'check', orderable:false, searchable:false},
        {data:'name', name:'name'},
        {data:'created_by', name:'created_by', orderable:false},
        {data:'comments', name:'comments', searchable:false, orderable:false},
        {data:'status', name:'status', searchable:false, orderable:false},
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
            error:err=>{
                SweetAlert({status:'error', message:err.responseJSON.message})
            }
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
            error:err=>{
                SweetAlert({status:'error', message:err.responseJSON.message})
            }
        })
    })

    $('#deleteArray').on('click', function (e) {
        e.preventDefault();
        if (value_checkbox.length < 1) {
            Swal.fire('Perhatian', 'Pilih salah satu!','warning')
            return 0;
        }
        $.ajax({
            url:'/api/v1/section/delete',
            data:{
                value : value_checkbox
            },
            type:'DELETE',
            headers:{
                'X-CSRF-TOKEN' : csrftoken
            },
            success:res=>{
                SweetAlert(res)
                RefreshTable('table')
                value_checkbox = []
            },
            error:err=>{
                SweetAlert({status:'error', message:err.responseJSON.message})
                value_checkbox = []
            }
        })
    })

    $('#table').on('click', '#edit', function (e) {
        e.preventDefault();
        let value = $(this).data('value')
        $.ajax({
            url:'/api/v1/section/get/'+value,
            type:'GET',
            success:res=>{
                $('#update_name').val(res.data.name)
                $('#update_name').data('id',res.data.id)
                $('#update_comments').val(res.data.comments)
                $('#updateSection').modal('show')
            },
            error:err=>{
                SweetAlert({status:'error', message:err.responseJSON.message})
            }
        })
    })

    $('#update').on('submit', function(e) {
        e.preventDefault();
        let value = new FormData(this)
        value.append('id', $('#update_name').data('id'));
        $.ajax({
            url:'/api/v1/section/update',
            data:value,
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
            error:err=>{
                SweetAlert({status:'error', message:err.responseJSON.message})
            }
        })
    })


    $('#table').on('change', '.input-toggle', function() {
        $.ajax({
            url:'/api/v1/section/status/update',
            data:{
                status:$(this).prop('checked') == true ? 1 : 0,
                id:$(this).data('value'),
            },
            type:'PUT',
            headers:{
                'X-CSRF-TOKEN' : csrftoken
            },
            success:res=>{
                SweetAlert(res)
                RefreshTable('table')
            },
            error:err=>{
                SweetAlert({status:'error', message:err.responseJSON.message})
            }
        })
    })
})

