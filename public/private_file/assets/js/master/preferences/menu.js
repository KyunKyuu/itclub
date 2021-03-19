$(document).ready(function() {
    const data = [
        {data:'check', name:'check', orderable:false, searchable:false},
        {data:'section_id', name:'section_id', orderable:false,},
        {data:'name', name:'name'},
        {data:'icon', name:'icon', orderable:false},
        {data:'type', name:'type', },
        {data:'comments', name:'action', searchable:false, orderable:false},
        {data:'status', name:'status', orderable:false},
        {data:'btn', name:'btn', searchable:false, orderable:false},
    ];

    Table({table:'#table', data:data, url:'/api/v1/preferences/menu'});

    $('#insert').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url:'/api/v1/menu/insert',
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
            url:'/api/v1/menu/delete',
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

    $('#table').on('click', '#edit', function (e) {
        e.preventDefault();
        let value = $(this).data('value')
        $.ajax({
            url:'/api/v1/menu/get/'+value,
            type:'GET',
            success:res=>{
                $('#updateMenu input[name="name"]').val(res.data.name);
                $('#updateMenu input[name="name"]').data('id',res.data.id);
                $('#updateMenu input[name="url"]').val(res.data.url);
                $('#updateMenu input[name="icon"]').val(res.data.icon);
                $('#updateMenu select[name="type"] option[value="'+res.data.type+'"]').attr('selected', true);
                $('#updateMenu select[name="section_id"] option[value="'+res.data.section_id+'"]').attr('selected', true);
                $('#updateMenu textarea[name="comments"]').val(res.data.comments);
                $('#updateMenu').modal('show');
            },
            error:err=>console.log(err)
        })
    })

    $('#update').on('submit', function(e) {
        e.preventDefault();
        let value = new FormData(this)
        value.append('id', $('#updateMenu input[name="name"]').data('id'));
        $.ajax({
            url:'/api/v1/menu/update',
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
            error:err=>console.log(err)
        })
    })

    $('#table').on('change', '.input-toggle', function() {
        $.ajax({
            url:'/api/v1/menu/status/update',
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
            error:err=>console.log(err)
        })
    })
})

