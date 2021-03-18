$(document).ready(function() {
    const data = [
        {data:'check', name:'check', orderable:false, searchable:false},
        {data:'menu_id', name:'menu_id', orderable:false,},
        {data:'name', name:'name'},
        {data:'comments', name:'action', searchable:false, orderable:false},
        {data:'status', name:'status', },
        {data:'btn', name:'btn', searchable:false, orderable:false},
    ];

    Table({table:'#table', data:data, url:'/api/v1/preferences/submenu'});

    $('#insert').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url:'/api/v1/submenu/insert',
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
            url:'/api/v1/submenu/delete',
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
            url:'/api/v1/submenu/get/'+value,
            type:'GET',
            success:res=>{
                $('#updateSubmenu input[name="name"]').val(res.data.name);
                $('#updateSubmenu input[name="name"]').data('id',res.data.id);
                $('#updateSubmenu input[name="url"]').val(res.data.url);
                $('#updateSubmenu input[name="icon"]').val(res.data.icon);
                $('#updateSubmenu select[name="type"] option[value="'+res.data.type+'"]').attr('selected', true);
                $('#updateSubmenu select[name="section_id"] option[value="'+res.data.section_id+'"]').attr('selected', true);
                $('#updateSubmenu textarea[name="comments"]').val(res.data.comments);
                $('#updateSubmenu').modal('show');
            },
            error:err=>console.log(err)
        })
    })

    $('#update').on('submit', function(e) {
        e.preventDefault();
        let value = new FormData(this)
        value.append('id', $('#updateSubmenu input[name="name"]').data('id'));
        $.ajax({
            url:'/api/v1/submenu/update',
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
})

